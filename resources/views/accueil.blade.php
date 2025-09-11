@extends('layout')
@section('title','Accueil')

@section('content')
<div class="center-card">
  <h2>Bienvenue {{ $user->prenom ?? $user->email }} 🎉</h2>
  <p>Nous sommes ravis de vous accueillir parmi nous.</p>
  <p>Alors {{ $user->prenom ?? 'ami' }}, que souhaitez-vous faire aujourd’hui ?</p>

  <div style="display:flex;gap:12px;margin-top:16px;">
    <a href="{{ route('dashboard') }}" class="btn primary animate-redirect">Poster une demande</a>
    <a href="{{ route('dashboard') }}" class="btn secondary animate-redirect">Répondre aux demandes</a>
    <a href="{{ route('dashboard') }}" class="btn outline animate-redirect">Explorer les artisans</a>
  </div>
</div>
@endsection
