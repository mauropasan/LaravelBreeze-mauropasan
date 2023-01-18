<nav>
    <ul>
        <li><a href="{{ route('ganga.index') }}">Inici</a></li>
        <li>Nous</li>
        <li>Destacats</li>
        @if(auth()->check())
            <li><a href="{{ route('profile.show', auth()->user()->username) }}">Perfil</a></li>
        @endif
    </ul>
    @if(auth()->check())
        <p>Hola, {{ auth()->user()->username }}</p>
        <a href="{{ route('logout') }}">Tancar sessió</a>
    @else
        <a href="{{ route('login') }}">Iniciar sessió</a>
        <a href="{{ route('register') }}">Registrar-se</a>
    @endif
</nav>
