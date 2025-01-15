<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthorsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ActivitiesController;




// Página principal

Route::middleware(['web'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/user', [UserController::class, 'profile'])->middleware('auth')->name('user.profile');
});


// Página de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Processa o login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Rota de logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota para exibir o formulário de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');

// Rota para processar o envio do formulário de registro
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');

Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors');

Route::get('/authors/{id_author}', [AuthorController::class, 'show'])->name('authors.show');

// Atualizar informações do usuário
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot-password.form');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForm'])->name('forgot-password.submit');

// Rota para o dashboard do admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Exibe o formulário de edição do perfil do administrador
Route::get('/admin/profile', [AdminController::class, 'editProfile'])->name('admin.profile');

// Atualiza o perfil do administrador
Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard do Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Rota para gerenciar livros
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    // Exibir a lista de autores
    Route::get('authors', [AuthorsController::class, 'index'])->name('admin.authors');
    // Exibir o formulário para criar um autor
    Route::get('authors/create', [AuthorsController::class, 'create'])->name('admin.authors.create');
    // Armazenar um novo autor
    Route::post('authors', [AuthorsController::class, 'store'])->name('admin.authors.store');
    // Exibir o formulário para editar um autor
    Route::get('authors/{author}/edit', [AuthorsController::class, 'edit'])->name('admin.authors.edit');
    // Atualizar um autor
    Route::put('authors/{author}', [AuthorsController::class, 'update'])->name('admin.authors.update');
    // Excluir um autor
    Route::delete('authors/{author}', [AuthorsController::class, 'destroy'])->name('admin.authors.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Rotas para Tags
    Route::get('tags', [TagController::class, 'index'])->name('tags');
    Route::post('tags', [TagController::class, 'store'])->name('tags.store');
    Route::delete('tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
});

Route::get('/user/upgrade', [UserController::class, 'upgradeToPremium'])->name('user.upgrade');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/make-premium/{id}', [UsersController::class, 'makePremium'])->name('users.makePremium');
    Route::get('/users/remove-premium/{id}', [UsersController::class, 'removePremium'])->name('users.removePremium');
});

Route::post('/books/{id}/rate', [BooksController::class, 'rate'])->name('book.rate');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities.index');
    Route::get('/activities/create', [ActivitiesController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivitiesController::class, 'store'])->name('activities.store');
    Route::delete('/activities/{id}', [ActivitiesController::class, 'destroy'])->name('activities.destroy');
});
Route::get('/books/{id}/activities', [BooksController::class, 'activities'])->name('books.activities');