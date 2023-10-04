<x-form action="{{ route($route) }}" method="POST" enctype="multipart/form-data" id="message-form">
    <input type="hidden" id="messageIdInput" name="message_id_comment">

    <x-form-item>
        <x-label required>{{ __('User name') }}</x-label>
        <x-input id="name" name="name" class="form-control" autofocus/>
        <x-error name="name"/>
        <x-error-client-side id="name-error"/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('E-mail') }}</x-label>
        <x-input id="email" type="email" name="email" class="form-control"/>
        <x-error name="email" />
        <x-error-client-side id="email-error"/>
    </x-form-item>

    <x-form-item>
        <x-label for="url">{{ __('URL') }}</x-label>
        <x-input type="url" name="url" class="form-control"/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Содержание сообщения') }}</x-label>

        <x-button-tegs/>

        <x-textarea name="content" class="form-control" id="content" rows="7">{{ old('content') }}</x-textarea>
        <x-error name="content"/>
        <x-error-client-side id="content-error"/>
    </x-form-item>

    <x-card id="preview" />

    <x-form-item>
        <label for="image">{{ __('Добавить изображение:') }}</label>
        <input type="file" name="image" id="imageInput" accept=".jpg, .png, .gif">
        <x-error name="image"/>
        <x-error-client-side id="text-image-error"/>
    </x-form-item>

    <x-form-item>
        <label for="text_file">{{ __('Текстовый файл:') }}</label>
        <input type="file" name="text_file" id="textFileInput" accept=".txt">
        <x-error name="text_file"/>
        <x-error-client-side id="text-file-error"/>
    </x-form-item>

    <x-form-item>
        <x-label required for="captcha">{{ __('Введите символы с изображения') }}</x-label>
        <x-input name="captcha" id="captcha" value="" class="form-control" required/>
        <x-error name="captcha"/>
    </x-form-item>

    <x-form-item>
        <img src="{{ captcha_src() }}" alt="CAPTCHA">
    </x-form-item>

    <x-button type="submit">
        {{ $buttonText }}
    </x-button>

</x-form>

@once
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/message-preview.js') }}"></script>
        <script src="{{ asset('js/validate-form.js') }}"></script>
        <script src="{{ asset('js/tag-message.js') }}"></script>
    @endpush
@endonce
