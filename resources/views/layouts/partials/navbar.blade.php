    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white border-bottom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Luthfi's Portofolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About Me</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}