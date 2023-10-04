<button {{ $attributes->class([
    "btn btn-outline-secondary",
])->merge([
    'type' => "button",
]) }}>
    {{ $slot }}
</button>

@once
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/get-message-id.js') }}"></script>
    @endpush
@endonce
