@isset($message->text_file)
    <a href="{{ asset('storage/' . $message->text_file) }}" target="_blank">{{ __('Просмотреть текстовый файл') }}</a>
@endisset
