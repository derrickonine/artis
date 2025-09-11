@extends('layout')
@section('title','Entrer le code')

@section('content')
<div class="center-card">
  <h2>Entrez le code reçu</h2>
  <p>Code envoyé (simulation) : <strong>{{ session('sim_sms_code') }}</strong></p>

  <form method="POST" action="{{ route('auth.verifycode.post') }}">
    @csrf
    <div class="form-group">
      <label>Code à 6 chiffres</label>
      <input type="text" name="code" required>
    </div>
    <button type="submit" class="btn primary">Vérifier</button>
  </form>
</div>
@endsection
