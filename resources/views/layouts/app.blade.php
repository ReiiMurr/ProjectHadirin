{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'HADIRIN')</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    /* Custom CSS jika perlu, misal kecilkan padding di mobile */
    body {
      background-color: #f8f9fa;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .content-wrapper {
      padding-top: 20px;
      padding-bottom: 20px;
    }
  </style>
</head>
<body>
  {{-- Navbar atau header global (jika ada) bisa diletakkan di sini --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">HADIRIN</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      {{-- Jika ingin menambahkan menu di navbar, tambahkan di sini --}}
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          {{-- Contoh link --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('kegiatan.index') }}">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('kehadiran.scan') }}">Scan Kehadiran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="content-wrapper">
    @yield('content')
  </main>

  <footer class="bg-light text-center py-3">
    &copy; {{ date('Y') }} HADIRIN. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
