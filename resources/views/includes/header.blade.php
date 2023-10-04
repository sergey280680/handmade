<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page">
                        {{ __('Главная') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showMessage.show') }}" class="nav-link {{ active_link('showMessage.show') }}" aria-current="page">
                        {{ __('Сообщения') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showComment.show') }}" class="nav-link {{ active_link('showComment.show') }}" aria-current="page">
                        {{ __('Комментарии') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('createMessage') }}" class="nav-link {{ active_link('createMessage') }}" aria-current="page">
                        {{ __('Оставить сообщение') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link {{ active_link('login') }}" aria-current="page">
                        {{ __('Вход') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
