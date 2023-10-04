<x-card {{ $attributes->class([])}}>
    <x-card-body>
        <x-card-header class="d-flex flex-row bg-body-secondary">
            <x-item-header-message>
                {{ $message->name }}
            </x-item-header-message>

            <x-item-header-message>
                {{ \Carbon\Carbon::parse($message->created_at)->format('d.m.y в H:i') }}
            </x-item-header-message>

            <x-item-header-message class="ms-auto">
                <x-button data-bs-toggle="modal" data-bs-target="#myModal" data-message-id="{{ $message->id }}">
                    {{ __('Комментировать') }}
                </x-button>
            </x-item-header-message>
        </x-card-header>

        <div>{!! htmlspecialchars_decode($message->content) !!}</div>

        <x-image :message="$message" />
        <x-text-file :message="$message" />

    </x-card-body>
    @if(isset($collectionComments))
        @foreach($collectionComments as $comment)
            @if($message->id == $comment->message_id_comment)
                <x-message :message="$comment" :collectionComments="$collectionComments" class="ms-5 mt-4" />
            @endif
        @endforeach
    @endif
</x-card>
