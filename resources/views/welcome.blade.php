@extends('layout')

@section('title', 'Bienvenue sur ArtisMaroc')

@section('content')
<div class="hero">
  <div class="hero-left">
    <h1>Rejoignez-nous — des habitants & professionnels de votre quartier répondent à tous vos besoins</h1>
    <p>Plombiers, électriciens, peintres, menuisiers… trouvez et contactez rapidement un artisan proche de vous.</p>
    <div class="cta">
      <a href="{{ route('auth.method') }}" class="btn primary animate-redirect">Créer un compte</a>
      <a href="{{ route('login') }}" class="btn secondary animate-redirect">Se connecter</a>
    </div>
  </div>
  <div class="hero-right">
    <div class="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://static.wixstatic.com/media/7d9939_47e59043380e47e6b5fccbb2a8445dce.jpg/v1/fill/w_980,h_654,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/7d9939_47e59043380e47e6b5fccbb2a8445dce.jpg" alt="Artisan 1">
        </div>
        <div class="carousel-item">
          <img src="https://www.webmx.fr/wp-content/uploads/2017/05/plombier-pas-cher.jpg" alt="Artisan 2">
        </div>
        <div class="carousel-item">
          <img src="https://tse3.mm.bing.net/th/id/OIP.AR_Wa77bC046jPICylRoAAHaE-?r=0&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Artisan 3">
        </div>
        <div class="carousel-item">
          <img src="https://www.cmgresillon.fr/media/3937/big/soudeur-metier-apprendre-soudure-souder.jpg" alt="Artisan 4">
        </div>
        <div class="carousel-item">
          <img src="https://apl.bg/wp-content/uploads/2023/07/mokro_boyadisvane_apl-scaled.jpg" alt="Artisan 5">
        </div>
        <div class="carousel-item">
          <img src="https://www.sage.com/es-es/blog/wp-content/uploads/sites/8/2017/12/ThinkstockPhotos-526747091.jpg" alt="Artisan 6">
        </div>
      </div>
      <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
    </div>
  </div>
</div>

<!-- Section Pourquoi choisir ArtisMaroc ? -->
<div class="center-card" style="margin-top: 40px;">
  <h2>Pourquoi choisir ArtisMaroc ?</h2>
  <div class="features" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px;">
    <div class="feature-card">
      <h3>Proximité</h3>
      <p>Trouvez des artisans près de chez vous en quelques clics.</p>
    </div>
    <div class="feature-card">
      <h3>Fiabilité</h3>
      <p>Artisans vérifiés pour garantir un travail de qualité.</p>
    </div>
    <div class="feature-card">
      <h3>Rapidité</h3>
      <p>Contactez un professionnel dès aujourd’hui !</p>
    </div>
  </div>
</div>

<!-- Section Artisans Populaires -->
<div class="center-card" style="margin-top: 40px;">
  <h2>Artisans Populaires</h2>
  <div class="artisans-list" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px; flex-wrap: wrap;">
    <div class="artisan-card">
      <img src="https://via.placeholder.com/150" alt="Artisan 1" style="width: 150px; height: 150px; object-fit: cover;">
      <p><strong>Mohammed - Plombier</strong></p>
      <p>Casablanca</p>
    </div>
    <div class="artisan-card">
      <img src="https://via.placeholder.com/150" alt="Artisan 2" style="width: 150px; height: 150px; object-fit: cover;">
      <p><strong>Fatima - Peintre</strong></p>
      <p>Rabat</p>
    </div>
    <div class="artisan-card">
      <img src="https://via.placeholder.com/150" alt="Artisan 3" style="width: 150px; height: 150px; object-fit: cover;">
      <p><strong>Ali - Électricien</strong></p>
      <p>Marrakech</p>
    </div>
  </div>
  <a href="{{ route('dashboard') }}" class="btn primary animate-redirect" style="margin-top: 20px; display: inline-block;">Voir tous les artisans</a>
</div>

<!-- Section Témoignages -->
<div class="center-card" style="margin-top: 40px; margin-bottom: 40px;">
  <h2>Ce que nos clients disent</h2>
  <div class="testimonials" style="margin-top: 20px;">
    <div class="testimonial-card">
      <p>"Service rapide et professionnel, je recommande vivement !"</p>
      <p><em>- Sara, Casablanca</em></p>
    </div>
    <div class="testimonial-card">
      <p>"Un artisan trouvé en moins d’une heure, incroyable !"</p>
      <p><em>- Karim, Rabat</em></p>
    </div>
  </div>
</div>

<style>
.carousel {
  position: relative;
  max-width: 980px;
  margin: auto;
  overflow: hidden;
}

.carousel-inner {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.carousel-item {
  min-width: 100%;
  display: none;
}

.carousel-item.active {
  display: block;
}

.carousel-item img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.carousel-control {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  font-size: 24px;
}

.prev {
  left: 10px;
  z-index: 1;
}

.next {
  right: 10px;
  z-index: 1;
}

/* Styles pour les nouvelles sections */
.feature-card, .artisan-card, .testimonial-card {
  background: #f9f9f9;
  padding: 20px;
  border-radius: 8px;
  text-align: center;
  width: 200px;
}

.features, .artisans-list, .testimonials {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
}

.artisans-list img {
  border-radius: 8px;
}

.testimonial-card {
  width: 300px;
}

.testimonial-card p:first-child {
  font-style: italic;
  color: #333;
}

.testimonial-card p:last-child {
  font-style: normal;
  color: #666;
  margin-top: 10px;
}
</style>

<script>
let currentIndex = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function showSlide(index) {
  if (index >= totalSlides) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = totalSlides - 1;
  } else {
    currentIndex = index;
  }

  slides.forEach((slide, i) => {
    slide.classList.remove('active');
    if (i === currentIndex) {
      slide.classList.add('active');
    }
  });
}

function moveSlide(step) {
  showSlide(currentIndex + step);
}

// Afficher la première image au chargement
showSlide(currentIndex);

// Optionnel : défilement automatique
setInterval(() => {
  moveSlide(1);
}, 5000); // Change d'image toutes les 5 secondes
</script>
@endsection