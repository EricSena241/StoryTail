<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Storytails</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background: url('images/floresta.jpeg') no-repeat center center;
      background-size: cover;
      height: 250px;
      color: #4E2F00;
      position: relative;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    header h1 {
      font-size: 2.5rem;
      color: white;
      margin: 0;
    }

    .header-content {
        text-align: center;
        margin-bottom: 20px; /* Espaço entre a busca e a barra de navegação */
    }

    .search-bar {
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-bar input[type="text"] {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      border: 2px solid #FF7F11;
      border-radius: 4px;
    }

    .search-bar select {
      padding: 10px;
      font-size: 16px;
      border: 2px solid #FF7F11;
      border-radius: 4px;
      background-color: white;
    }

    .search-bar button {
      padding: 10px;
      background: #FF7F11;
      border: none;
      border-radius: 4px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .auth-buttons {
      position: absolute;
      right: 20px;
      top: 20px;
      display: flex;
      gap: 10px;
    }

    .auth-buttons a {
      margin: 0 10px;
      padding: 10px 20px;
      background: #4E2F00;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 4px;
      text-align: center;
      display: inline-block;
    }

    .auth-buttons a:hover {
      background: #FF7F11;
    }

    nav {
      background: #FF7F11;
      padding: 10px;
      text-align: center;
      color: white;
      width: 100%;
    }

    nav a {
      margin: 0 20px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
    }

    .new-books {
      padding: 20px;
      text-align: center;
    }

    .book-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 5px; 
      justify-content: center;
      padding: 20px;
    }

    .book-card {
      width: 250px;
      background: #f8f8f8;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .book-card img {
      width: 100%;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }

    .book-card h3 {
      margin: 10px 0;
    }

    .book-card a {
      margin: 10px;
      padding: 10px;
      border: none;
      background: orange;
      color: white;
      font-weight: bold;
      text-decoration: none;
      border-radius: 4px;
      display: inline-block;
    }

    .book-card a:hover {
      background: #FF7F11;
    }

    footer {
      background: #FF7F11;
      color: white;
      text-align: center;
      padding: 40px 0;
      margin-top: 10px;
    }

    .footer-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-logo {
    border-radius: 50%;
    padding: 20px; /* Aumenta o espaço dentro do círculo */
    width: 120px; /* Aumenta o tamanho do círculo */
    height: 120px; /* Aumenta o tamanho do círculo */
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
}

.footer-logo img {
    width: 80%; /* Ajuste o tamanho da logo dentro do círculo */
}

    .footer-links {
      margin-bottom: 10px;
    }

    .footer-links a {
      margin: 0 10px;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .footer-logo img {
      width: 60%;
    }

    .footer-social {
      margin: 10px 0;
    }

    .footer-social a {
      margin: 0 10px;
    }

    .footer-social img {
      width: 24px;
      vertical-align: middle;
    }

    .logo-top-left {
      position: absolute;
      top: 10px;
      left: 10px;
      width: 70px;
      height: 70px;
    }
  </style>
</head>
<body>

  <header>
  <img src="images/logo1.png" alt="Logo" class="logo-top-left">
  <div class="auth-buttons">
  @auth
  @if (auth()->user()->id_usertype == 3)
    <a href="{{ route('user.profile') }}">Premium</a>
  @else
    <a href="{{ route('user.profile') }}">User</a>
  @endif
  @if (auth()->user()->id_usertype == 2)
    <a href="{{ route('admin.dashboard') }}">Admin</a>
  @endif
  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" style="background: #4E2F00; color: white; border: none; border-radius: 4px; padding: 10px 20px; font-weight: bold; cursor: pointer;">Logout</button>
  </form>
  @endauth
  @guest
  <a href="{{ route('login') }}">Sign In</a>
  <a href="{{ route('register.form') }}">Register</a>
  @endguest
</div>

    <div class="header-content">
        <h1>Find a Book</h1>
        <div class="search-bar">
        <input type="text" id="search-title" placeholder="Search by title...">
        <select id="filter-category">
            <option value="">All Categories</option>
            <option value="Children">Children</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Adventure">Adventure</option>
        </select>
        <button id="search-button">Search</button>
        </div>
    </div>
  </header>
  <nav>
    <a id="all-books-button">All Books</a>
    <a id="our-picks-button">Our Picks</a>
    <a href="#">Most Popular</a>
  </nav>

  <section class="new-books">
    <h2>Children Books</h2>
    <div class="book-grid">
      <div class="book-card" data-title="Charlotte's Web" data-category="Children">
        <img src="{{ asset('images/CharlottWeb.jpg') }}" alt="Charlotte's Web">
        <h3>Charlotte's Web</h3>
        <a href="{{ route('books.show', ['id' => 1]) }}">Read</a>
      </div>
      <div class="book-card" data-title="The Gruffalo" data-category="Children">
        <img src="{{ asset('images/TheGruffalo.png') }}" alt="The Gruffalo">
        <h3>The Gruffalo</h3>
        <a href="{{ route('books.show', ['id' => 2]) }}">Read</a>
      </div>
      <div class="book-card" data-title="Flynn's Perfect Pet" data-category="Fantasy">
        <img src="{{ asset('images/PerfectPet.jpg') }}" alt="Flynn's Perfect Pet">
        <h3>Flynn's Perfect Pet</h3>
        <a href="{{ route('books.show', ['id' => 3]) }}">Read</a>
      </div>
      <div class="book-card" data-title="Freddie and the Fairy" data-category="Adventure">
  <img src="{{ asset('images/FreddieFairy.jpeg') }}" alt="Freddie and the Fairy">
  <h3>Freddie and the Fairy</h3>

  @auth
    @if (auth()->user()->id_usertype == 3)
      <!-- Botão funcional para usuários Premium -->
      <a href="{{ route('books.show', ['id' => 4]) }}" style="background: orange; color: white; font-weight: bold;">Read</a>
    @else
      <!-- Botão desativado para não Premium -->
      <a href="javascript:void(0)" style="pointer-events: none; background: gray; color: white; cursor: not-allowed;">Read</a>
      <p style="color: red; font-weight: bold; margin-top: 5px;">Premium Only</p>
    @endif
  @else
    <!-- Exibição para visitantes (não logados) -->
    <a href="javascript:void(0)" style="pointer-events: none; background: gray; color: white; cursor: not-allowed;">Read</a>
    <p style="color: red; font-weight: bold; margin-top: 5px;">Log in to access Premium content</p>
  @endauth
</div>
    </div>
  </section>

  <footer>
    <div class="footer-container">
        <div class="footer-logo">
          <img src="images/logo2.png" alt="Logo">
        </div>   
        <div class="footer-links">
        <a href="#">Books</a>
        <a href="{{ route('authors') }}">Authors</a>
        <a href="{{ route('contact') }}">Contacts</a>
        <a href="{{ route('about') }}">About us</a>
        <a href="#">Terms</a>
        </div>
    </div>
    <p>&copy; 2024 storytail.pt</p>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('search-title');
      const filterCategory = document.getElementById('filter-category');
      const searchButton = document.getElementById('search-button');
      const bookCards = document.querySelectorAll('.book-card');
      const allBooksButton = document.getElementById('all-books-button');
      const ourPicksButton = document.getElementById('our-picks-button');

      function filterBooks() {
        const searchQuery = searchInput.value.toLowerCase();
        const selectedCategory = filterCategory.value;

        bookCards.forEach(card => {
          const title = card.dataset.title.toLowerCase();
          const category = card.dataset.category;

          const matchesTitle = title.includes(searchQuery);
          const matchesCategory = !selectedCategory || category === selectedCategory;

          card.style.display = matchesTitle && matchesCategory ? '' : 'none';
        });
      }

      function showAllBooks() {
        bookCards.forEach(card => card.style.display = '');
      }

      function showOurPicks() {
        bookCards.forEach(card => {
          const title = card.dataset.title.toLowerCase();
          card.style.display = (title === "charlotte's web" || title === "the gruffalo") ? '' : 'none';
        });
      }

      
      searchInput.addEventListener('input', filterBooks);
      filterCategory.addEventListener('change', filterBooks);
      searchButton.addEventListener('click', filterBooks);
      allBooksButton.addEventListener('click', showAllBooks);
      ourPicksButton.addEventListener('click', showOurPicks);
    });
  </script>
</body>
</html>
