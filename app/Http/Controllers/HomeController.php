<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial.
     */
    public function index()
    {
        // Obtém o usuário autenticado (retorna null se não houver usuário autenticado)
        $user = auth()->user();

        // Retorna a view 'home' e passa a variável $user para ela
        return view('home', compact('user'));
    }
}
