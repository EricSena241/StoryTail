<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            padding: 8px 12px;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-premium {
            background-color: #28a745;
        }

        .btn-remove {
            background-color: #dc3545;
        }

        .btn-premium:hover {
            background-color: #218838;
        }

        .btn-remove:hover {
            background-color: #c82333;
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

        <h1>Users Management</h1>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->id_usertype == 1 ? 'User' : 'Premium' }}</td>
                        <td>
                            @if($user->id_usertype == 1)
                                <a href="{{ route('admin.users.makePremium', $user->id_user) }}" class="btn btn-premium">Make Premium</a>
                            @elseif($user->id_usertype == 3)
                                <a href="{{ route('admin.users.removePremium', $user->id_user) }}" class="btn btn-remove">Remove Premium</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>