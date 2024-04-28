<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('static/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    @role('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/posts">Manage Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/settings">Settings</a>
                    </li>
                    @endrole

                    @role('editor')
                    <li class="nav-item">
                        <a class="nav-link" href="/editor/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/editor/posts">Manage Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/editor/settings">Settings</a>
                    </li>
                    @endrole

                    @role('user')
                    <li class="nav-item">
                        <a class="nav-link" href="/user/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/profile">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/settings">Settings</a>
                    </li>
                    @endrole

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>
