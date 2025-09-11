@extends('layout')
@section('title','Choisir rôle')
@section('content')
<div class="center-card">
  <h2>Je m'inscris en tant que...</h2>
  <div class="options">
    <a href="{{ route('auth.register.form', ['role' => 'particulier']) }}" class="btn primary animate-redirect">Particulier</a>
    <a href="{{ route('auth.register.form', ['role' => 'auto']) }}" class="btn secondary animate-redirect">Auto-entrepreneur / Indépendant</a>
    <a href="{{ route('auth.register.form', ['role' => 'entreprise']) }}" class="btn secondary animate-redirect">Entreprise</a>
  </div>
</div>
@endsection
