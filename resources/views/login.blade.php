<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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

        .login-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            position: relative;
        }

        .login-container .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.2rem;
            color: #000;
            text-decoration: none;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
        }

        .login-container label {
            font-size: 0.9rem;
            color: #666;
            display: block;
            margin-bottom: 0.5rem;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .login-container input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .login-container button {
            width: 100%;
            padding: 0.8rem;
            background-color: #ccc;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
        }

        .login-container button:disabled {
            background-color: #e0e0e0;
            cursor: not-allowed;
        }

        .login-container .actions {
            margin-top: 1rem;
            text-align: center;
        }

        .login-container .actions a {
            text-decoration: none;
            font-size: 0.9rem;
            color: #007bff;
            margin: 0 0.5rem;
        }

        .login-container .actions a:hover {
            text-decoration: underline;
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

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <!-- Botão de Voltar -->
    <a href="{{ route('home') }}" class="btn-back">← Back to Homepage</a>

    <div class="login-container">
        <a href="#" class="close-btn">&times;</a>
        <h2>Sign in</h2>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" required>
            @error('username')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <div>
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>

            <button type="submit">Sign in</button>
        </form>

        <div class="actions">
            <a href="{{ route('forgot-password.form') }}">Forgot your password?</a>
            <br>
            <a href="{{ route('register.form') }}">Don't have an account? Register</a>
        </div>
    </div>
</body>
</html>
