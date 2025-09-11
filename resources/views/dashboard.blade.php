@extends('layout')
@section('title','Tableau de bord')

@section('content')
<div class="container">
  <h2>Tableau de bord</h2>
  <p>Fonctionnalités : recherche artisans, annonces, profils, messages.</p>

  <div class="search-box">
    <input type="text" placeholder="Rechercher artisan, métier, quartier...">
    <button class="btn primary">Rechercher</button>
  </div>

  <div class="cards">
    <div class="card">Exemple d'annonce 1</div>
    <div class="card">Profil artisan 1</div>
    <div class="card">Message récent</div>
  </div>
</div>
@endsection
