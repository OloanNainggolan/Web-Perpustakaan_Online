<footer id="footer" class="footer mt-auto" style="background: linear-gradient(135deg, #198754, #20c997);">
    <div class="container py-4">
      <!-- Main Footer Content -->
      <div class="row text-white mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
          <h5 class="fw-bold mb-3">
            <i class="bi bi-book-half me-2"></i>BookZone
          </h5>
          <p class="small">Platform review buku terlengkap untuk pecinta literasi di Indonesia.</p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px;">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px;">
              <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px;">
              <i class="bi bi-instagram"></i>
            </a>
          </div>
        </div>
        
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="fw-bold mb-3">Menu Cepat</h6>
          <ul class="list-unstyled small">
            <li class="mb-2"><a href="/welcome" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Dashboard</a></li>
            <li class="mb-2"><a href="/genres" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Genres</a></li>
            <li class="mb-2"><a href="/books" class="text-white text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Books</a></li>
          </ul>
        </div>
        
        <div class="col-md-4">
          <h6 class="fw-bold mb-3">Kontak</h6>
          <p class="small mb-2"><i class="bi bi-envelope me-2"></i>info@bookzone.com</p>
          <p class="small mb-2"><i class="bi bi-telephone me-2"></i>+62 812-3456-7890</p>
          <p class="small"><i class="bi bi-geo-alt me-2"></i>Jakarta, Indonesia</p>
        </div>
      </div>
      
      <!-- Copyright -->
      <hr class="border-light opacity-25">
      <div class="text-center text-white">
        <p class="mb-0 small">
          © {{ date('Y') }} <strong>BookZone</strong>. All Rights Reserved.
          <br>
          <span class="small opacity-75">Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> untuk pecinta buku</span>
        </p>
      </div>
    </div>
</footer>

<style>
  footer a:hover {
    opacity: 0.8;
    transform: translateY(-2px);
    transition: all 0.3s ease;
  }
</style>
