<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function show($id)
    {
        // Logique pour afficher les détails d'une demande
        return view('request.show', ['id' => $id]); // Crée une vue request/show.blade.php si besoin
    }

    public function create()
    {
        // Logique pour créer une nouvelle demande
        return view('request.create'); // Crée une vue request/create.blade.php si besoin
    }
}