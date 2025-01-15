<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\AgeGroup; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Página de listagem dos livros
    public function index()
    {
        $authors = Author::all();  // Carregar todos os autores
        $books = Book::with('ageGroup')->get();  // Carregar livros com o relacionamento com 'ageGroup'
        return view('admin.books.index', compact('books', 'authors'));  // Passar livros e autores para a view
    }

    // Página para criar um novo livro
    public function create()
    {
        $ageGroups = AgeGroup::all();  // Recupera todos os grupos etários
        $authors = Author::all();  // Recupera todos os autores
        return view('admin.books.create', compact('ageGroups', 'authors'));  // Passa ambas as variáveis para a view
    }

    // Armazenar um novo livro no banco
    public function store(Request $request)
{
    // Validação dos dados recebidos do formulário
    $validated = $request->validate([
        'title' => 'required|string|max:60',
        'book_description' => 'nullable|string|max:1000',
        'cover_url' => 'nullable|string|max:255',
        'video_url' => 'nullable|string|max:255',
        'book_url' => 'nullable|string|max:255',
        'read_time' => 'required|integer',
        'age_group' => 'required|exists:age_groups,id_agegroup',
        'is_active' => 'required|boolean',  // Garantir que o campo seja um booleano
        'authors' => 'required|array|min:1',  // Valida que pelo menos um autor seja selecionado
    ]);

    // Criar o livro com os dados fornecidos
    $book = Book::create($request->only([
        'title', 'book_description', 'cover_url', 'video_url', 'book_url', 'read_time', 'age_group'
    ]) + ['is_active' => (bool) $request->input('is_active')]);  // Converter explicitamente para booleano

    // Associar autores ao livro
    $book->authors()->attach($request->input('authors'));

    // Redirecionar com mensagem de sucesso
    return redirect()->route('admin.books')->with('success', 'Book added successfully.');
}

    // Página para editar um livro
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();  // Carregar todos os autores disponíveis
        $ageGroups = AgeGroup::all();  // Carregar todos os grupos etários
        return view('admin.books.edit', compact('book', 'authors', 'ageGroups'));  // Passar livro, autores e grupos etários para a view
    }

    // Atualizar um livro
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos do formulário
        $request->validate([
            'title' => 'required|string|max:60',
            'book_description' => 'nullable|string|max:1000',
            'cover_url' => 'nullable|string|max:255',
            'video_url' => 'nullable|string|max:255',
            'book_url' => 'nullable|string|max:255',
            'read_time' => 'required|integer',
            'age_group' => 'required|exists:age_groups,id_agegroup',
            'is_active' => 'required|boolean',
            'authors' => 'required|array|min:1',  // Valida que pelo menos um autor seja selecionado
        ]);

        $book = Book::findOrFail($id);

        // Atualizar o livro
        $book->update($request->only([
            'title', 'book_description', 'cover_url', 'video_url', 'book_url', 'read_time', 'age_group', 'is_active'
        ]));

        // Atualizar a associação de autores
        $book->authors()->sync($request->input('authors'));  // Sync atualiza as associações existentes

        return redirect()->route('admin.books')->with('success', 'Book updated successfully.');
    }

    // Deletar livro
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->authors()->detach();  // Desassociar os autores antes de deletar
        $book->delete();

        return redirect()->route('admin.books')->with('success', 'Book deleted successfully.');
    }
}
