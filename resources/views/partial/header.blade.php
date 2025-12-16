<header id="header" class="bg-white shadow-sm sticky-top py-3">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">

    <!-- Logo -->
    <a href="/welcome" class="d-flex align-items-center text-decoration-none mb-2 mb-lg-0">
      <i class="bi bi-book-half fs-3 text-success me-2"></i>
      <span class="fs-4 fw-bold" style="color: #198754;">BookZone<span class="text-primary">.</span></span>
    </a>

    <!-- Navigation Menu for Desktop -->
    <nav id="navmenu" class="d-none d-xl-block">
      <ul class="nav list-unstyled mb-0 gap-2">
        <li>
          <a href="/welcome" class="nav-link text-dark fw-semibold px-3 {{ request()->is('welcome') ? 'active' : '' }}">
            <i class="bi bi-house-door me-1"></i>Dashboard
          </a>
        </li>

        <li>
          <a href="/genres" class="nav-link text-dark fw-semibold px-3 {{ request()->is('genres*') ? 'active' : '' }}">
            <i class="bi bi-bookmark-star me-1"></i>Genres
          </a>
        </li>

        <li>
          <a href="/books" class="nav-link text-dark fw-semibold px-3 {{ request()->is('books*') ? 'active' : '' }}">
            <i class="bi bi-book me-1"></i>Books
          </a>
        </li>

        @auth
        <li>
          <a href="/profile" class="nav-link text-dark fw-semibold px-3 {{ request()->is('profile*') ? 'active' : '' }}">
            <i class="bi bi-person-circle me-1"></i>Profile
          </a>
        </li>
        @endauth
      </ul>
    </nav>

    <!-- Auth Buttons -->
    <div class="d-flex align-items-center gap-2 mb-2 mb-lg-0">
      @guest
        <a href="/login" class="btn btn-outline-success rounded-pill px-4">
          <i class="bi bi-box-arrow-in-right me-1"></i>Login
        </a>
        <a href="/register" class="btn btn-success rounded-pill px-4">
          <i class="bi bi-person-plus me-1"></i>Register
        </a>
      @endguest

      @auth
        <div class="dropdown">
          <button class="btn btn-success rounded-pill px-4 dropdown-toggle" type="button" 
                  id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
            <li>
              <a class="dropdown-item" href="/profile">
                <i class="bi bi-person me-2"></i>Profil Saya
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button class="dropdown-item text-danger" type="submit">
                  <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
      @endauth

      <!-- Mobile Nav Toggle -->
      <i class="bi bi-list mobile-nav-toggle d-xl-none fs-3 text-dark ms-2" style="cursor: pointer;"></i>
    </div>
  </div>
</header>

<!-- Mobile Nav -->
<nav id="mobile-nav" class="d-xl-none bg-white shadow-sm position-absolute w-100 d-none" style="z-index: 1000;">
  <ul class="list-unstyled mb-0 p-3">
    <li>
      <a href="/welcome" class="d-block py-3 px-3 text-dark fw-semibold rounded hover-item">
        <i class="bi bi-house-door me-2"></i>Dashboard
      </a>
    </li>
    <li>
      <a href="/genres" class="d-block py-3 px-3 text-dark fw-semibold rounded hover-item">
        <i class="bi bi-bookmark-star me-2"></i>Genres
      </a>
    </li>
    <li>
      <a href="/books" class="d-block py-3 px-3 text-dark fw-semibold rounded hover-item">
        <i class="bi bi-book me-2"></i>Books
      </a>
    </li>
    @auth
    <li>
      <a href="/profile" class="d-block py-3 px-3 text-dark fw-semibold rounded hover-item">
        <i class="bi bi-person-circle me-2"></i>Profile
      </a>
    </li>
    <li><hr class="my-2"></li>
    <li>
      <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-danger w-100 rounded-pill" type="submit">
          <i class="bi bi-box-arrow-right me-2"></i>Logout
        </button>
      </form>
    </li>
    @else
    <li><hr class="my-2"></li>
    <li>
      <a href="/login" class="d-block py-2">
        <button class="btn btn-outline-success w-100 rounded-pill">
          <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
      </a>
    </li>
    <li>
      <a href="/register" class="d-block py-2">
        <button class="btn btn-success w-100 rounded-pill">
          <i class="bi bi-person-plus me-2"></i>Register
        </button>
      </a>
    </li>
    @endauth
  </ul>
</nav>

<!-- Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    
    if (mobileToggle && mobileNav) {
      mobileToggle.addEventListener('click', () => {
        mobileNav.classList.toggle('d-none');
        mobileNav.classList.toggle('show');
      });

      // Close mobile nav when clicking outside
      document.addEventListener('click', (e) => {
        if (!mobileNav.contains(e.target) && !mobileToggle.contains(e.target)) {
          mobileNav.classList.add('d-none');
          mobileNav.classList.remove('show');
        }
      });
    }
  });
</script>

<!-- Styles -->
<style>
  .nav-link {
    transition: all 0.3s ease;
    border-radius: 0.5rem;
    position: relative;
  }

  .nav-link:hover {
    background-color: #e8f5e9;
    color: #198754 !important;
    transform: translateY(-2px);
  }

  .nav-link.active {
    background-color: #198754;
    color: white !important;
  }

  .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 3px;
    background: #20c997;
    border-radius: 2px;
  }

  .hover-item {
    transition: all 0.3s ease;
  }

  .hover-item:hover {
    background-color: #e8f5e9;
    transform: translateX(5px);
  }

  #mobile-nav {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
  }

  #mobile-nav.show {
    max-height: 500px;
  }

  .dropdown-menu {
    border-radius: 0.75rem;
    border: none;
  }

  .dropdown-item {
    padding: 0.75rem 1.25rem;
    transition: all 0.3s ease;
  }

  .dropdown-item:hover {
    background-color: #e8f5e9;
    color: #198754;
    transform: translateX(5px);
  }
    border-radius: 0.375rem;
  }
</style>
