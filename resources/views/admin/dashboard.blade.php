<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #6c757d; /* Cor de fundo do dashboard */
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
            width: 80%; /* Ajuste para deixar o dashboard maior */
            position: relative;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            font-size: 2rem; /* Aumentar o título do dashboard */
            color: #333;
            text-align: center;
        }

        .btn-back {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #FF7F11; /* Cor laranja */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #e67e00; /* Cor de hover para o botão */
        }

        .btn-edit {
            background-color: #FF7F11;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px; /* Espaçamento para ficar abaixo do título */
            text-align: center;
        }

        .btn-edit:hover {
            background-color: #e67e00;
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
        <h2>Admin Dashboard</h2>
        <!-- Botão Edit Profile, com cor laranja e alinhado corretamente -->
        <a href="{{ route('admin.profile') }}" class="btn-edit">Edit Profile</a>
        <a href="{{ route('admin.books') }}" class="btn-edit">Add/Edit Books</a> 
        <a href="{{ route('admin.authors') }}" class="btn-edit">Add/Edit Authors</a> 
        <a href="{{ route('admin.tags') }}" class="btn-edit">Tags</a>
        <a href="{{ route('admin.users.index') }}" class="btn-edit">Users</a>
        <a href="{{ route('admin.activities.index') }}" class="btn-edit">Activities</a>
    </div>
</body>
</html>
