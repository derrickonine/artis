@extends('layout')
@section('title','Inscription')

@section('content')
<div class="center-card">
  <h2>Créer mon compte — {{ ucfirst($role) }}</h2>

  @if($errors->any())
    <div class="errors">
      <ul>
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form id="registerForm" method="POST" action="{{ route('register.post') }}">
    @csrf
    <input type="hidden" name="role" value="{{ $role }}">
    <div class="form-group">
      <label>Prénom *</label>
      <input type="text" name="prenom" required>
    </div>
    <div class="form-group">
      <label>Nom *</label>
      <input type="text" name="nom" required>
    </div>
    <div class="form-group">
      <label>Adresse postale *</label>
      <input type="text" name="adresse" required>
    </div>
    <div class="form-group">
      <label>Téléphone *</label>
      <input type="text" name="phone" required>
    </div>
    <div class="form-group">
      <label>Email *</label>
      <input type="email" name="email" required>
    </div>

    <div class="form-group">
      <label>Mot de passe *</label>
      <input id="password" type="password" name="password" required>
      <small id="pw-hint">Min 8 char, 1 maj, 1 min, 1 chiffre, 1 spécial</small>
      <div id="pw-meter" class="pw-meter"><div class="pw-meter-fill"></div></div>
    </div>

    <div class="form-group">
      <label>Confirmer le mot de passe *</label>
      <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div style="display:flex;gap:12px;">
      <button type="submit" class="btn primary">S'inscrire & vérifier</button>
      <a href="{{ route('auth.verify.skip') }}" class="btn secondary animate-redirect">Faire plus tard</a>
    </div>
  </form>
</div>
@endsection
