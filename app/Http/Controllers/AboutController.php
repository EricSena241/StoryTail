<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Exibir página "Sobre Nós"
    public function index()
    {
        $aboutData = [
            'title' => 'About Us',
            'description' => "Welcome to Storytails! We're dedicated to providing engaging, inspiring, and fun books for kids of all ages. Our mission is to spark imagination and create a love for reading in children.",
            'mission' => "To make storytelling accessible, fun, and inclusive for everyone.",
            'vision' => "A world where every child has the opportunity to discover the joy of reading.",
            'image' => '/images/about_us.jpg', // Caminho da imagem sobre nós
        ];

        return view('about', compact('aboutData'));
    }
}