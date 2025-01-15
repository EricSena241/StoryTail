<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        input[type="checkbox"] {
            width: auto;
            margin-top: 0;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group {
            display: flex;
            flex-direction: column;
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
    <a href="{{ route('admin.books') }}" class="btn-back">← Back to Index</a>

    <div class="container">
        <h2>Edit Book</h2>

        <form action="{{ route('admin.books.update', $book->id_book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label for="book_description">Description</label>
                <textarea id="book_description" name="book_description">{{ old('book_description', $book->book_description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="cover_url">Cover URL</label>
                <input type="text" id="cover_url" name="cover_url" value="{{ old('cover_url', $book->cover_url) }}">
            </div>

            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input type="text" id="video_url" name="video_url" value="{{ old('video_url', $book->video_url) }}">
            </div>

            <div class="form-group">
                <label for="book_url">Book URL</label>
                <input type="text" id="book_url" name="book_url" value="{{ old('book_url', $book->book_url) }}">
            </div>

            <div class="form-group">
                <label for="read_time">Read Time (minutes)</label>
                <input type="number" id="read_time" name="read_time" value="{{ old('read_time', $book->read_time) }}" required>
            </div>

            <div class="form-group">
                <label for="age_group">Age Group</label>
                <select name="age_group" id="age_group" required>
                    @foreach($ageGroups as $ageGroup)
                        <option value="{{ $ageGroup->id_agegroup }}" {{ old('age_group', $book->age_group) == $ageGroup->id_agegroup ? 'selected' : '' }}>
                            {{ $ageGroup->age_group }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="is_active">Is Active</label>
                <select name="is_active" id="is_active" required>
                    <option value="1" {{ old('is_active', $book->is_active) == 1 ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_active', $book->is_active) == 0 ? 'selected' : '' }}>False</option>
                </select>
            </div>

            <div class="form-group">
                <label for="authors">Authors</label>
                <select name="authors[]" id="authors" multiple required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id_author }}" 
                            {{ in_array($author->id_author, old('authors', $book->authors->pluck('id_author')->toArray())) ? 'selected' : '' }}>
                            {{ $author->first_name }} {{ $author->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Update Book</button>
        </form>
    </div>

</body>
</html>
