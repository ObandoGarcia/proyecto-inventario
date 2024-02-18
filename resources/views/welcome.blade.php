<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('/') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="{{ url('/') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ url('/') }}/assets/js/config.js"></script>
  </head>
  <body>
    @if (session('status'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="" alt="Imagen de empresa" width="100" height="83">
        <h1 class="display-5 fw-bold text-body-emphasis">Sistema de gestion de Inventario</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">
            Descripcion de la empresa
          </p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="/login">
              <button class="btn btn-primary btn-lg px-4 gap-3">Iniciar sesion</button>
            </a>
          </div>
        </div>

    </div>

  </body>
    <script src="{{ url('/') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/menu.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ url('/') }}/assets/js/main.js"></script>
    <script src="{{ url('/') }}/assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
