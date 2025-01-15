<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Authors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #FF7F11;
        }
        .btn-edit:hover {
            background-color: #e67e00;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
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

    <a href="{{ route('admin.dashboard') }}" class="btn-back">← Back to Dashboard</a>

    <div class="container">
        <h2>List of Authors</h2>
        <a href="{{ route('admin.authors.create') }}" class="btn-edit">Add New Author</a>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Nationality</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->first_name }}</td>
                        <td>{{ $author->last_name }}</td>
                        <td>{{ $author->nationality }}</td>
                        <td>
                            <a href="{{ route('admin.authors.edit', $author->id_author) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.authors.destroy', $author->id_author) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
