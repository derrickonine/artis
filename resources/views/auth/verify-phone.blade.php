@extends('layout')
@section('title','Vérification téléphone')

@section('content')
<div class="center-card">
  <h2>Vérification de votre téléphone</h2>
  <p>Nous allons envoyer un code par SMS (simulation).</p>
  <form method="POST" action="{{ route('auth.sendcode') }}">
    @csrf
    <div class="form-group">
      <label>Numéro (veuillez vérifier)</label>
      <input type="text" name="phone" value="{{ auth()->user()->phone ?? '' }}" required>
    </div>
    <div style="display:flex;gap:12px;">
      <button type="submit" class="btn primary">Recevoir le code</button>
      <a href="{{ route('auth.verify.skip') }}" class="btn secondary animate-redirect">Vérifier plus tard</a>
    </div>
</form>
</div>
@endsection
