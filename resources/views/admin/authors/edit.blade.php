<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #FF7F11;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #e67e00;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <a href="{{ route('admin.authors') }}" class="btn-back">← Back to Authors List</a>

    <div class="container">
        <h2>Edit Author</h2>
        <form action="{{ route('admin.authors.update', $author->id_author) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $author->first_name) }}" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $author->last_name) }}" required>

            <label for="nationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $author->nationality) }}" required>

            <label for="author_description">Description</label>
            <textarea id="author_description" name="author_description">{{ old('author_description', $author->author_description) }}</textarea>

            <label for="author_photo_url">Photo URL</label>
            <input type="url" id="author_photo_url" name="author_photo_url" value="{{ old('author_photo_url', $author->author_photo_url) }}">

            <button type="submit">Save Changes</button>
        </form>
    </div>

</body>
</html>
