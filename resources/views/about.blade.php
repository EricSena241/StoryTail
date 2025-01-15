<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $aboutData['title'] }} - Storytails</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .about-page {
            padding: 40px 20px;
        }
        .about-header {
            background-color: #ff6f00;
            color: #fff;
            padding: 40px 20px;
            border-radius: 10px;
        }
        .about-header h1 {
            font-size: 48px;
            font-weight: bold;
        }
        .about-section {
            margin-top: 30px;
        }
        .about-section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
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

    <div class="container about-page">
        <!-- Cabeçalho -->
        <div class="about-header text-center">
            <h1>{{ $aboutData['title'] }}</h1>
            <p>{{ $aboutData['description'] }}</p>
        </div>

        <!-- Seção de Conteúdo -->
        <div class="row about-section">
            <!-- Imagem -->
            <div class="col-md-6 text-center">
                <img src="images/Logo3.png" alt="About Us">
            </div>
            <!-- Texto -->
            <div class="col-md-6">
                <h3>Our Mission</h3>
                <p>{{ $aboutData['mission'] }}</p>

                <h3>Our Vision</h3>
                <p>{{ $aboutData['vision'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>