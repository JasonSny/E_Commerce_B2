<style>
    .nav-link {
        color: #636b6f;
        padding: 0 25px;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

</style>

@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __("S'enregister ") }}</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{ route('indexUser') }}"> Mon compte </a>
            <a class="dropdown-item" href="{{ route('home') }}"> Mes commandes </a>
            
            @can('manage-users')
                <a class="dropdown-item" href="{{ route('admin.users.index') }}"> Commande(s) des utilisateurs </a>
            @endcan

            @can('manage-users')
                <a class="dropdown-item" href="{{ route('admin.products.index') }}"> Jeux </a>
            @endcan

            @can('manage-users')
                <a class="dropdown-item" href="{{ route('admin.users.index') }}"> Liste des Utilisateurs </a>
            @endcan

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                {{ __('Déconnexion') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
