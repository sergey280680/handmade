@extends('layouts.main')

@php
    $columns = [
        'name' => __('Имя'),
        'email' => __('Email'),
        'created_at' => __('Дата публикации'),
    ];
@endphp

@section('page.title', "Сообщения Dzen")

@section('main.content')
    @if(empty($collectionMessages->total()))
        <div class="text-center">
            <h5>
                {{ __('Никто еще неоставил ни одного сообщения.') }}
            </h5>
        </div>
    @else
        <h1>{{ __('Список сообщений') }}</h1>
        <table class="table">
            <thead>
            <tr>
                @foreach($columns as $field => $label)
                    <th>
                        {{ $label }}
                        <a href="{{ route('showMessage.show', ['field' => $field, 'order' => 'asc']) }}">&#8657</a>
                        <a href="{{ route('showMessage.show', ['field' => $field, 'order' => 'desc']) }}">&#8659</a>
                    </th>
                @endforeach
                <th>{{ __('Сообщение') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($collectionMessages as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d.m.y H:i') }}</td>
                    <td>
                        {!! strlen($user->content) > 20 ? substr($user->content, 0, 20) . '...' : $user->content !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    {{ $collectionMessages->links() }}
@endsection
