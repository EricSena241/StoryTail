<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - Book Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .book-container {
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }
        .book-header {
            text-align: center;
        }
        .book-cover {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .book-details {
            margin-top: 20px;
        }
        .book-details p {
            font-size: 16px;
        }
        .btn-read {
            background-color: #ff6f00;
            color: #fff;
            font-weight: bold;
        }
        .btn-read:hover {
            background-color: #e65c00;
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
            background-color: #ff6f00;
        }
        .btn-author {
            background-color: #ff6f00;
            color: #fff;
            font-weight: bold;
        }
        .btn-author:hover {
            background-color: #e65c00;
        }
        .rating {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .rating label {
            cursor: pointer;
            font-size: 2rem;
            color: #ff6f00;
        }
        .rating input {
            display: none;
        }
        .rating input:checked ~ label {
            color: #e65c00;
        }
    </style>
</head>
<body>
    <!-- Botão de Voltar -->
    <a href="{{ route('home') }}" class="btn-back">← Back to Homepage</a>

    <div class="container book-container">
        <!-- Cabeçalho -->
        <div class="book-header">
            <h1>{{ $book->title }}</h1>
            @if ($book->is_active)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </div>

        <!-- Capa do Livro -->
        <div class="text-center mt-4">
            <img 
                src="{{ $book->cover_url ? asset($book->cover_url) : 'https://via.placeholder.com/300x400?text=No+Cover+Available' }}"  
                alt="{{ $book->title }}" 
                class="book-cover"
            >
        </div>

        <!-- Detalhes do Livro -->
        <div class="book-details mt-4">
            <h4>Description</h4>
            <p>{{ $book->book_description ?? 'No description available.' }}</p>

            <h4>Details</h4>
            <p><strong>Reading Time:</strong> {{ $book->read_time }} minutes</p>
            <p><strong>Age Group:</strong> {{ $book->ageGroup->age_group ?? 'Not specified' }}</p>
        </div>

        <!-- Botões -->
        <div class="text-center mt-4">
            @if($book->book_url)
                <a href="{{ $book->book_url }}" class="btn btn-read btn-lg" target="_blank">Read Now</a>
            @else
                <button class="btn btn-read btn-lg" disabled>Read Now (Not Available)</button>
            @endif

            @if($book->video_url)
                <a href="{{ $book->video_url }}" class="btn btn-read btn-lg" target="_blank">Watch Now</a>
            @else
                <button class="btn btn-read btn-lg" disabled>Watch Now (Not Available)</button>
            @endif
        </div>

        <div class="text-center mt-3">
            @if($book->authors->isNotEmpty())
                @foreach($book->authors as $author)
                    <a href="{{ route('authors.show', $author->id_author) }}" class="btn btn-author btn-sm mt-2">About Author: {{ $author->first_name }} {{ $author->last_name }}</a>
                @endforeach
            @endif
        </div>

        <!-- Sistema de Avaliação -->
        <div class="mt-4">
    <h4>Rate this Book</h4>
    <form action="{{ route('book.rate', $book->id_book) }}" method="POST" id="ratingForm">
        @csrf
        <div class="rating" id="ratingContainer" data-current-rating="{{ $currentRating ?? 0 }}">
            @for ($i = 1; $i <= 5; $i++)
                <label>
                    <input type="radio" name="rating" value="{{ $i }}" {{ isset($currentRating) && $currentRating == $i ? 'checked' : '' }} />
                    <span class="star {{ isset($currentRating) && $currentRating >= $i ? 'selected' : '' }}">★</span>
                </label>
            @endfor
        </div>
        <div class="text-center mt-2">
            <button type="submit" class="btn btn-primary">Submit Rating</button>
        </div>
    </form>
</div>

<style>
    .rating {
        display: flex;
        justify-content: center;
        gap: 5px;
    }
    .rating label {
        cursor: pointer;
        font-size: 2rem;
        color: #ccc;
    }
    .rating label .star {
        font-size: 2rem;
    }
    .rating label .star.selected {
        color: #ff6f00;
    }
</style>
    <h4>Average Rating</h4>
    <p>
        @php
            $averageRating = \App\Models\BookUserRead::where('id_book', $book->id_book)->avg('rating');
        @endphp
        {{ number_format($averageRating, 1) }} / 5
    </p>
    <div class="text-center mt-4">
    <a href="{{ route('books.activities', $book->id_book) }}" class="btn btn-activities">View Activities</a>
</div>

<style>
    .btn-activities {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-activities:hover {
        background-color: #0056b3;
    }
</style>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ratingContainer = document.getElementById("ratingContainer");
        const stars = ratingContainer.querySelectorAll(".star");

        stars.forEach((star, index) => {
            star.addEventListener("click", () => {
                stars.forEach((s, i) => {
                    s.classList.toggle("selected", i <= index);
                });
            });
        });

        // Atualiza a visualização com base no valor atual
        const currentRating = parseInt(ratingContainer.dataset.currentRating, 10);
        stars.forEach((star, index) => {
            if (index < currentRating) {
                star.classList.add("selected");
            }
        });
    });
</script>
    </div>
</body>
</html>
