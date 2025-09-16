<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title','ArtisMaroc')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header class="navbar">
    <div class="logo">ArtisMaroc</div>
    <nav>
      @guest
  <a href="{{ route('welcome') }}">Accueil</a>
@endguest
      <a href="{{ route('about') }}">À propos</a>
      <a href="{{ route('contact') }}">Contact</a>
      @auth
        <a href="{{ route('accueil') }}">Mon espace</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
          @csrf
          <button class="link-like" type="submit">Déconnexion</button>
        </form>
      @else
        <a href="{{ route('login') }}">Connexion</a>
      @endauth
      
    </nav>
  </header>

  <main>
    @if(session('success'))
      <div class="flash success">{{ session('success') }}</div>
    @endif
    @if(session('message'))
      <div class="flash info">{{ session('message') }}</div>
    @endif
    @if(session('info'))
      <div class="flash info">{{ session('info') }}</div>
    @endif

    @yield('content')
  </main>

  <footer>
    <div class="footer-content">
      <p>© {{ date('Y') }} ArtisMaroc — Tous droits réservés</p>
      <div class="footer-links">
        <a href="{{ route('about') }}">À propos</a>
        <a href="{{ route('contact') }}">Contact</a>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
