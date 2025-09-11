@extends('layout')
@section('title','Connexion')

@section('content')
<div class="center-card">
  <h2>Connexion</h2>

  @if($errors->any())
    <div class="errors"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif

  <form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" required>
    </div>
    <div class="form-group">
      <label>Mot de passe</label>
      <input type="password" name="password" required>
    </div>
    <button type="submit" class="btn primary">Se connecter</button>
  </form>

  <p style="margin-top:12px">Pas encore de compte ? <a href="{{ route('auth.method') }}" class="animate-redirect">S'inscrire</a></p>
</div>
@endsection
