<nav class="navbar bg-dark-subtle sticky-top row m-0 mb-3 p-2">
    <div class="col-2 m-0">
        <a href="{{ route('ganga.index') }}"><img src="/logo.png" class="w-50"></a>
    </div>
    <ul class="navbar list-unstyled my-1 col-3">
        <li class="nav-item mx-3"><a href="{{ route('ganga.index') }}">Inici</a></li>
        <li class="nav-item mx-3"><a href="{{ route('ganga.newest') }}">Nous</a></li>
        <li class="nav-item mx-3"><a href="{{ route('ganga.featured') }}">Destacats</a></li>
        @if(auth()->check())
            <li class="nav-item mx-3"><a href="{{ route('profile.show', auth()->user()->username) }}">Perfil</a></li>
            <li class="nav-item mx-3"><a href="{{ route('ganga.create'), auth()->user()->username}}">Nova ganga</a></li>
        @endif
    </ul>
    @if(auth()->check())
        <ul class="navbar m-0 float-end list-unstyled col-2 row text-end">
            <li class="nav-item">Hola, {{ auth()->user()->username }}</li>
            <li class="nav-item"><a href="{{ route('logout') }}">Tancar sessió</a></li>
        </ul>
    @else
        <ul class="navbar m-0 float-end list-unstyled col-2 row text-end">
            <a class="nav-item"href="{{ route('login') }}">Iniciar sessió</a>
            <a class="nav-item" href="{{ route('register') }}">Registrar-se</a>
        </ul>
    @endif
</nav>
