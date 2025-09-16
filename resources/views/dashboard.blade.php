@extends('layout')
@section('title','Tableau de bord')

@section('content')
<div class="container">
  <h2>Tableau de bord</h2>
  <p>Fonctionnalités : recherche artisans, annonces, profils, messages.</p>

  <div class="search-box">
    <form action="{{ route('dashboard') }}" method="GET">
      <input type="text" name="search" placeholder="Rechercher artisan, métier, quartier..." value="{{ request()->input('search') }}">
      <button type="submit" class="btn primary">Rechercher</button>
    </form>
  </div>

  <div class="cards">
    @forelse($announcements as $announcement)
      <div class="card">{{ $announcement['title'] }} <small>({{ $announcement['created_at']->format('d/m/Y H:i') }})</small></div>
    @empty
      <p>Aucune annonce disponible pour le moment.</p>
    @endforelse
  </div>

  <!-- Section Vos Demandes en Cours -->
  <div class="center-card" style="margin-top: 40px;">
    <h2>Vos demandes en cours</h2>
    <div class="requests" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px; flex-wrap: wrap;">
      @forelse($requests as $request)
        <div class="request-card">
          <h3>{{ $request['title'] }}</h3>
          <p>Date : {{ $request['date'] }}</p>
          <p>Statut : {{ $request['status'] }}</p>
          <a href="{{ route('request.show', $request['id'] ?? '') }}" class="btn secondary animate-redirect">Voir détails</a>
        </div>
      @empty
        <p>Aucune demande en cours.</p>
      @endforelse
    </div>
    <a href="{{ route('request.create') }}" class="btn primary animate-redirect" style="margin-top: 20px; display: inline-block;">Créer une nouvelle demande</a>
  </div>

  <!-- Section Suggestions d'Artisans -->
  <div class="center-card" style="margin-top: 40px;">
    <h2>Suggestions d'artisans</h2>
    <div class="artisans-list" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px; flex-wrap: wrap;">
      @forelse($suggestedArtisans as $artisan)
        <div class="artisan-card">
          <img src="https://via.placeholder.com/150" alt="{{ $artisan['name'] }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
          <p><strong>{{ $artisan['name'] }}</strong></p>
          <p>{{ $artisan['location'] }}</p>
          <a href="{{ route('artisan.contact', $artisan['id'] ?? '') }}" class="btn secondary animate-redirect">Contacter</a>
        </div>
      @empty
        <p>Aucun artisan suggéré pour le moment.</p>
      @endforelse
    </div>
  </div>

  <!-- Section Notifications -->
  <div class="center-card" style="margin-top: 40px; margin-bottom: 40px;">
    <h2>Notifications</h2>
    <div class="notifications" style="margin-top: 20px;">
      @forelse($notifications as $notification)
        <div class="notification-card">
          <p>{{ $notification['message'] }} <small>({{ $notification['created_at']->format('d/m/Y') }})</small></p>
        </div>
      @empty
        <p>Aucune notification pour le moment.</p>
      @endforelse
    </div>
    <a href="{{ route('notifications.index') }}" class="btn primary animate-redirect" style="margin-top: 20px; display: inline-block;">Voir toutes les notifications</a>
  </div>
</div>

<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.search-box {
  display: flex;
  gap: 10px;
  margin-top: 20px;
}

.search-box input {
  flex: 1;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.search-box button {
  padding: 10px 20px;
}

.cards, .requests, .artisans-list, .notifications {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 20px;
}

.card, .request-card, .artisan-card, .notification-card {
  background: #f9f9f9;
  padding: 15px;
  border-radius: 8px;
  width: 200px;
  text-align: center;
}

.artisan-card img {
  margin-bottom: 10px;
}

.notification-card {
  width: 300px;
  text-align: left;
}

.notification-card p {
  margin: 5px 0;
}

.notification-card small {
  color: #666;
}
</style>
@endsection