@include('layouts.frame.head')

<body>
    <div id="app">
        @include('components.theme')
        @auth
            @include('layouts.navbar.guest.topnav')
            <main>
                @yield('content')
            </main>
        @endauth

        @guest
            @if (in_array(request()->route()->getName(),
                    ['login', 'register', 'password.request', 'password.email', 'password.reset']))
                <main>
                    @yield('content')
                </main>
            @else
                @include('layouts.navbar.guest.topnav')
                <main>
                    @yield('content')
                </main>
            @endif
        @endguest
        {{-- @include('layouts.footer.guest.footer') --}}
    </div>

    @include('layouts.frame.foot')
</body>

</html>
