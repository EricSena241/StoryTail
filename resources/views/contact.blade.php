<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

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

    <div class="container mt-5">
        <h1 class="text-center mb-4">Contact Us</h1>

        <!-- Mensagem de sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulário de contato -->
        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Your Message *</label>
                <textarea name="message" id="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </form>

        <!-- Informações de contato -->
        <div class="mt-5">
            <p><strong>Phone:</strong> +351 912345678</p>
            <p><strong>Email:</strong> info@storytail.pt</p>
        </div>
    </div>
</body>
</html>