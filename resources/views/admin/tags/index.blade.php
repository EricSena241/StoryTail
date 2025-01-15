<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tags</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            position: relative;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: #333;
            text-align: center;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f4f4f9;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
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
    </style>
</head>
<body>
    <a href="{{ route('admin.dashboard') }}" class="btn-back">← Back to Dashboard</a>

    <div class="container">
        <h2>Manage Tags</h2>

        <!-- Form to add a new tag -->
        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tag_name">New Tag Name</label>
                <input type="text" id="tag_name" name="tag_name" required>
            </div>
            <button type="submit">Add Tag</button>
        </form>

        <!-- List of existing tags -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id_tag }}</td>
                        <td>{{ $tag->tag_name }}</td>
                        <td>
                            <form action="{{ route('admin.tags.destroy', $tag->id_tag) }}" method="POST" style="display:inline;">
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