<nav class="navbar bg-dark-subtle sticky-top mb-3">
    <ul class="navbar list-unstyled my-1">
        <li class="nav-item mx-3"><a href="{{ route('ganga.index') }}">Inici</a></li>
        <li class="nav-item mx-3">Nous</li>
        <li class="nav-item mx-3">Destacats</li>
        @if(auth()->check())
            <li class="nav-item mx-3"><a href="{{ route('profile.show', auth()->user()->username) }}">Perfil</a></li>
            <li class="nav-item mx-3"><a href="{{ route('ganga.create'), auth()->user()->username}}">Nova ganga</a></li>
        @endif
    </ul>
    @if(auth()->check())
        <p class="nav-item mx-3 my-1">Hola, {{ auth()->user()->username }}</p>
        <a class="nav-item mx-3 my-1"href="{{ route('logout') }}">Tancar sessió</a>
    @else
        <ul class="navbar mx-3 my-1 float-end">
            <a class="nav-item mx-3"href="{{ route('login') }}">Iniciar sessió</a>
            <a class="nav-item mx-3" href="{{ route('register') }}">Registrar-se</a>
        </ul>
    @endif
</nav>
