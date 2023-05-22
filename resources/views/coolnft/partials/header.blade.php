    <!-- navbar -->
    <header class="sticky-top" id="navbar">
        <div class="container">
            <a href="/"><img class="img-fluid logo" src="{{ asset('coolnft/img/LOGO.png') }}" alt="logo"></a>
            <input id="page-nav-toggle" class="main-navigation-toggle" type="checkbox" />
            <label for="page-nav-toggle">
                <svg class="icon--menu-toggle" viewBox="0 0 60 30">
                    <g class="icon-group">
                        <g class="icon--menu">
                            <path d="M 6 0 L 54 0" />
                            <path d="M 6 15 L 54 15" />
                            <path d="M 6 30 L 54 30" />
                        </g>
                        <g class="icon--close">
                            <path d="M 15 0 L 45 30" />
                            <path d="M 15 30 L 45 0" />
                        </g>
                    </g>
                </svg>
            </label>

            <nav class="main-navigation">
                <ul>
                    @guest
                    @if (Route::has('login'))
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                    @if (Route::has('register-user'))
                    <li><a href="{{ route('register-user' )}}">Register</a></li>
                    @endif
                    @else
                    <li><a href="/">Home</a></li>
                    <li><a href="collection">Collection</a></li>
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>