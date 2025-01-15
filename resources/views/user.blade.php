<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            width: 400px;
            position: relative;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
            text-align: center;
        }

        label {
            font-size: 0.9rem;
            color: #666;
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background-color: #FF7F11;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
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

        .success-message {
            color: green;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="btn-back">← Back to Homepage</a>
    <div class="container">
        <h2>User Profile</h2>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.update') }}" method="POST">
            @csrf

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
            @error('first_name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
            @error('last_name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password (leave blank to keep current)</label>
            <input type="password" id="password" name="password" placeholder="New password">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Update Profile</button>
            <button type="button" 
        onclick="location.href='{{ route('user.upgrade') }}'"
        style="margin-top: 1rem; 
               width: 100%; 
               padding: 0.8rem; 
               background-color: {{ $user->id_usertype == 3 || $user->id_usertype == 2 ? '#ccc' : '#FF7F11' }}; 
               color: {{ $user->id_usertype == 3 || $user->id_usertype == 2 ? '#666' : '#fff' }}; 
               border: none; 
               border-radius: 4px; 
               font-size: 1rem; 
               cursor: {{ $user->id_usertype == 3 || $user->id_usertype == 2 ? 'not-allowed' : 'pointer' }};"
        {{ $user->id_usertype == 3 || $user->id_usertype == 2 ? 'disabled' : '' }}>
    {{ $user->id_usertype == 3 ? 'Already Premium' : ($user->id_usertype == 2 ? 'Already Admin' : 'Upgrade to Premium') }}
</button>



        </form>
    </div>
</body>
</html>
