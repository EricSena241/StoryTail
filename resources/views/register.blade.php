<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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

        .register-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            position: relative;
        }

        .register-container h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
        }

        .register-container a {
            position: absolute;
            top: 1rem;
            right: 1rem;
            text-decoration: none;
            font-size: 0.9rem;
            color: #007bff;
        }

        .register-container label {
            font-size: 0.9rem;
            color: #666;
            display: block;
            margin-bottom: 0.5rem;
        }

        .register-container input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .register-container button {
            width: 100%;
            padding: 0.8rem;
            background-color: #ccc;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
        }

        .register-container button:disabled {
            background-color: #e0e0e0;
            cursor: not-allowed;
        }

        .register-container .form-row {
            display: flex;
            gap: 1rem;
        }

        .register-container .form-row div {
            flex: 1;
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

    <div class="register-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="/login">Log in instead</a>
        <h2>Create an account</h2>
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="form-row">
                <div>
                    <label for="first_name">Firstname</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter your firstname" required>
                </div>
                <div>
                    <label for="last_name">Lastname</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter your lastname" required>
                </div>
            </div>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>

            <label for="id_usertype">User Type</label>
            <select id="id_usertype" name="id_usertype" required>
                @foreach($userTypes as $userType)
                    <option value="{{ $userType->id_usertype }}">{{ $userType->user_type }}</option>
                @endforeach
            </select>

            <button type="submit">Create an account</button>
        </form>
    </div>
</body>
</html>