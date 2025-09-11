@extends('layout')
@section('title','Choisir méthode')
@section('content')
<div class="center-card">
  <h2>Comment souhaitez-vous vous inscrire ?</h2>
  <div class="options">
    <a href="{{ route('auth.role') }}" class="btn primary animate-redirect">S'inscrire par e-mail</a>
    <a href="#" class="btn secondary">S'inscrire avec Google (à implémenter)</a>
  </div>
</div>
@endsection
