<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pakar</title>
  <link rel="icon" type="image/x-icon" href="/assets/Unsera.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">Sistem Pakar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          {{-- <li class="nav-item">
            <a class="nav-link" href="/kuesioneruser">Kuesioner Pengguna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kuesionerpakar">Kuesioner Pakar</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="/kriteria">Kriteria</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="/skala">Skala</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/bobot">Bobot</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/penilaian">Penilaian</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="/alternatif">Alternatif</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/perhitungan">Perhitungan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    @yield('content')
  </div>

  <!-- JavaScript dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
