<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font Awesome Free -->
    <script src="{{ config('services.fontawesome.url') }}" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Dropdown menu-->
    <style>
        .group:hover .group-hover\:scale-100 { transform: scale(1) }
        .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
        .scale-0 { transform: scale(0) }
        .min-w-32 { min-width: 8rem }
    </style>

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app">
    <header class="bg-blue-900 py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div>
                <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                    {{ config('app.name') }}
                </a>
            </div>
            <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <div style="float:right;">
                        <img src="{{ auth()->user()->avatar_url.'&d=identicon' }}">
                    </div>

                    <div class="group inline-block">
                        <button class="outline-none focus:outline-none px-3 py-1 bg-blue rounded-sm flex items-center min-w-32">
                            <span class="pr-1 font-semibold flex-1"><i class="fas fa-user-edit"></i> {{ Auth::user()->name }}</span>
                        </button>
                        <ul class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-500 text-gray-900">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-500 text-gray-900">
                                <a href="{{ route('editProfile') }}">Edit profile</a>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-500 text-gray-900">
                                <a href="{{ route('changePassword') }}">Change password</a>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-500 text-gray-900">
                                <a href="/two_auth_page">Two Factor Authentication</a>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-500 text-gray-900">
                                <a href="{{ route('logout') }}"
                                   class="no-underline hover:underline"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>


                @endguest
            </nav>
        </div>
    </header>

    @yield('sidebar')
    @yield('content')

</div>
</body>
</html>
