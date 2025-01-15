<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f28d4c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .forgot-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        .forgot-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
        }

        .forgot-container label {
            font-size: 0.9rem;
            color: #666;
            display: block;
            margin-bottom: 0.5rem;
        }

        .forgot-container input[type="text"],
        .forgot-container input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .forgot-container button {
            width: 100%;
            padding: 0.8rem;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .success-message {
            color: green;
            font-size: 0.9rem;
            margin-bottom: 1rem;
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
    <a href="{{ route('login') }}" class="btn-back">← Back to Login</a>

    <div class="forgot-container">
        <h2>Forgot Password</h2>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <form action="{{ route('forgot-password.submit') }}" method="POST">
            @csrf

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" required>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>
            @error('new_password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Reset Password</button>
        </form>
    </div>

</body>
</html>
