@extends('layouts.base')

@section('page.title', "Оставить сообщение")

@section('content')
    <section>
        <x-container>
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <x-card>
                            <x-card-header>
                                <x-card-title>
                                    {{ __('Оставить сообщение') }}
                                </x-card-title>
                            </x-card-header>

                            <x-card-body>
                                <x-message-form buttonText="Сохранить" route="createMessage.store"></x-message-form>
                            </x-card-body>
                        </x-card>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
@endsection
