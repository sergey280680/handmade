@extends('layouts.main')

@section('page.title', "Сообщения Dzen")

@section('main.content')
    @if(empty($collectionMessages->total()))
        {{ __('Никто еще неоставил ни одного сообщения.') }}
    @else
        {{ $collectionMessages->links() }}
        @foreach($collectionMessages as $message)
            <x-message :message="$message" :collectionComments="$collectionComments" class="mt-4"/>
        @endforeach

        {{ $collectionMessages->links() }}
        @include('includes.modal-form')
    @endif
@endsection
