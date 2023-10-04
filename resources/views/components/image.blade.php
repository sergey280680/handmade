@isset($message->image)
    <div>
        <a href="{{ asset('storage/' . $message->image) }}" data-lightbox="image-{{ $message->id }}">
            <img width="100" src="{{ asset('storage/' . $message->image) }}" alt="Изображение">
        </a>
    </div>
@endisset

@once
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    @endpush

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    @endpush
@endonce
