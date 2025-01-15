<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    // Exibir a lista de autores
    public function index()
    {
        $authors = Author::all(); // Obter todos os autores
        return view('admin.authors.index', compact('authors'));
    }

    // Exibir o formulário para criar um autor
    public function create()
    {
        return view('admin.authors.create');
    }

    // Armazenar um novo autor
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'author_description' => 'nullable|max:1000',
            'author_photo_url' => 'nullable|url',
            'nationality' => 'required|max:255',
        ]);

        Author::create($request->all());

        return redirect()->route('admin.authors')->with('success', 'Author added successfully.');
    }

    // Exibir o formulário para editar um autor
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    // Atualizar um autor
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'author_description' => 'nullable|max:1000',
            'author_photo_url' => 'nullable|url',
            'nationality' => 'required|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('admin.authors')->with('success', 'Author updated successfully.');
    }

    // Excluir um autor
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.authors')->with('success', 'Author deleted successfully.');
    }
}
