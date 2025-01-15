<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Activities</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background: #f8f9fa;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn-back {
            position: absolute;
            top: 10px;
            left: 10px;
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
    <a href="{{ route('books.show', $book->id_book) }}" class="btn-back">← Back to Book</a>
    <div class="container">
        <h1>Activities for "{{ $book->title }}"</h1>
        @if ($book->activities->isEmpty())
            <p>No activities found for this book.</p>
        @else
            <ul>
                @foreach ($book->activities as $activity)
                    <li>
                        <strong>{{ $activity->title }}</strong>
                        <p>{{ $activity->activity_description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>