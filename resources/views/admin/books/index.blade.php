<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Books</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFD479;
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
            width: 100%;
            max-width: 900px;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        table th, table td {
            padding: 0.8rem;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #FF7F11;
            color: white;
        }

        .btn-add-book {
            display: inline-block;
            background-color: #FF7F11;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 1.5rem;
        }

        .btn-add-book:hover {
            background-color: #e65c00;
        }

        .btn-edit, .btn-delete {
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-edit {
            background-color: #5bc0de;
        }

        .btn-edit:hover {
            background-color: #31b0d5;
        }

        .btn-delete {
            background-color: #d9534f;
        }

        .btn-delete:hover {
            background-color: #c9302c;
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
        <h2>Books Management</h2>

        <a href="{{ route('admin.books.create') }}" class="btn-add-book">Add New Book</a>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Age Group</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ Str::limit($book->book_description, 50) }}</td>
                        <td>{{ $book->ageGroup->age_group ?? 'N/A' }}</td>
                        <td>{{ $book->is_active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('admin.books.edit', $book->id_book) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->id_book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
