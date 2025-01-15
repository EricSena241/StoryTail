<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        // Busca todos os autores para a listagem
        $authors = Author::all();

        // Retorna a view com a listagem de autores
        return view('authors', compact('authors'));
    }

    public function show($id_author)
    {
        // Busca o autor pelo ID, incluindo os livros relacionados
        $author = Author::with('books')->where('id_author', $id_author)->firstOrFail();

        // Retorna a view com os detalhes do autor
        return view('authors', compact('author'));
    }
}
