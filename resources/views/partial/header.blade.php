<header id="header" class="bg-white shadow-sm sticky-top py-3">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">

    <!-- Logo -->
    <a href="/" class="d-flex align-items-center text-decoration-none mb-2 mb-lg-0">
      <i class="bi bi-book-half fs-3 text-success me-2"></i>
      <span class="fs-4 fw-bold text-success-emphasis">BookZone<span class="text-primary">.</span></span>
    </a>

    <!-- Navigation Menu for Desktop -->
<nav id="navmenu" class="d-none d-xl-block">
  <ul class="nav list-unstyled mb-0 gap-3">

    <li>
      <a href="/welcome" class="nav-link text-dark fw-semibold {{ request()->is('welcome') ? 'active' : '' }}">
        Dashboard
      </a>
    </li>

    <li>
      <a href="/genres" class="nav-link text-dark fw-semibold {{ request()->is('genres') ? 'active' : '' }}">
        Genres
      </a>
    </li>

    <li>
      <a href="/books" class="nav-link text-dark fw-semibold {{ request()->is('books') ? 'active' : '' }}">
        Books
      </a>
    </li>

    @auth
    <li>
      <a href="/profile" class="nav-link text-dark fw-semibold {{ request()->is('profile') ? 'active' : '' }}">
        Profile
      </a>
    </li>
    @endauth

  </ul>
</nav>
    <!-- Auth Buttons -->
    @guest
 
    <div class="d-flex align-items-center gap-2 mb-2 mb-lg-0">
      <a href="/login" class="btn btn-outline-success rounded-pill px-3">Login</a>
      <a href="/register" class="btn btn-success rounded-pill px-3">Register</a>
    </div>
    @endguest

    @auth
    <form action="/logout" method="POST">
      @csrf
      <button  class="btn btn-danger">logout</button>
    </form>        
    @endauth


    <!-- Mobile Nav Toggle -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none fs-3 text-dark" style="cursor: pointer;"></i>
  </div>
</header>

<!-- Mobile Nav -->
<nav id="mobile-nav" class="d-xl-none bg-white shadow p-4 position-absolute top-100 start-0 w-100 d-none z-3">
  <ul class="list-unstyled mb-0">
    <li><a href="/welcome" class="d-block py-2 text-dark fw-semibold">📊 Dashboard</a></li>
    <li><a href="/genres" class="d-block py-2 text-dark fw-semibold">🎼 Genres</a></li>
    <li><a href="/login" class="d-block py-2 text-dark fw-semibold">🔑 Login</a></li>
  </ul>
</nav>

<!-- Script -->
<script>
  document.querySelector('.mobile-nav-toggle').addEventListener('click', () => {
    document.getElementById('mobile-nav').classList.toggle('d-none');
  });
</script>

<!-- Styles -->
<style>
  .nav-link {
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
  }

  .nav-link:hover {
    background-color: #d1e7dd;
    color: #0f5132 !important;
  }

  .navmenu ul li a.active {
    background-color: #198754;
    color: white !important;
  }

  /* Extra for mobile */
  #mobile-nav a:hover {
    background-color: #f8f9fa;
    border-radius: 0.375rem;
  }
</style>
