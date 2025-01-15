<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Activity</title>
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

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
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
    <a href="{{ route('admin.activities.index') }}" class="btn-back">← Back to Activities</a>
    <div class="container">
        <h1>Create Activity</h1>
        <form action="{{ route('admin.activities.store') }}" method="POST">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="description">Description</label>
            <textarea name="activity_description" id="description"></textarea>

            <label for="books">Select Books</label>
            <select name="books[]" id="books" multiple>
                @foreach ($books as $book)
                    <option value="{{ $book->id_book }}">{{ $book->title }}</option>
                @endforeach
            </select>

            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>