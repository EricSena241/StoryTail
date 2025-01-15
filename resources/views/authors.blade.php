<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($author) ? $author->first_name . ' ' . $author->last_name : 'Authors - StoryTails' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .author-card, .detail-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s ease;
        }
        .author-card:hover {
            transform: scale(1.02);
        }
        .author-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .detail-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 20px auto;
        }
        .info {
            padding: 20px;
            text-align: center;
        }
        .info h4 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .info p {
            font-size: 14px;
            color: #666;
        }
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <!-- Botão de Voltar -->
    <a href="{{ route('home') }}" class="btn-back">← Back to Homepage</a>

    <div class="container">
        @if(isset($authors)) <!-- Página de Listagem -->
        <h1 class="text-center mb-5">Authors</h1>
        <div class="row g-4">
            @foreach($authors as $author)
            <div class="col-md-4">
                <div class="author-card">
                    <img src="{{ $author->author_photo_url ? asset($author->author_photo_url) : 'https://via.placeholder.com/500x600?text=No+Cover+Available' }}" alt="{{ $author->first_name }} {{ $author->last_name }}" class="author-image">
                    <div class="info">
                        <h4>{{ $author->first_name }} {{ $author->last_name }}</h4>
                        <p>{{ Str::limit($author->author_description, 100) }}</p>
                        <p><small>{{ $author->nationality }}</small></p>
                        <a href="{{ route('authors.show', $author->id_author) }}" class="btn btn-primary btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @elseif(isset($author)) <!-- Página de Detalhes -->
        <div class="detail-card text-center p-4">
            <img src="{{ $author->author_photo_url ? asset($author->author_photo_url) : 'https://via.placeholder.com/150x150?text=No+Photo+Available' }}" alt="{{ $author->first_name }} {{ $author->last_name }}" class="detail-photo">
            <h1>{{ $author->first_name }} {{ $author->last_name }}</h1>
            <p><small>{{ $author->nationality }}</small></p>
            <p class="mt-3">{{ $author->author_description }}</p>

            <h3 class="mt-5">Books by {{ $author->first_name }}</h3>
            @if($author->books->isNotEmpty())
            <ul class="list-group mt-3">
                @foreach($author->books as $book)
                <li class="list-group-item">
                    <a href="{{ route('books.show', $book->id_book) }}">{{ $book->title }}</a>
                </li>
                @endforeach
            </ul>
            @else
            <p>No books available for this author.</p>
            @endif
        </div>
        @endif
    </div>
</body>
</html>
