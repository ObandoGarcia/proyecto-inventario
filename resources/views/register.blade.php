<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inventario</title>
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
  <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/pages/page-auth.css" />
  <script src="{{ url('/') }}/assets/vendor/js/helpers.js"></script>
  <script src="{{ url('/') }}/assets/js/config.js"></script>

</head>
<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body">
            <div class="app-brand justify-content-center">
              <h1 class="app-brand-text demo text-body fw-bold">Registro de usuario</h1>
            </div>
            <h4 class="mb-2">Bienvenido! </h4>
            <p class="mb-4">Ingresa los datos del usuario a registrar</p>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Ingresa tu nombre" autofocus required />
                </div>
              <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Ingresa tu correo"required />
              </div>
              <br>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" required class="form-control" name="password" required
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Registrarse</button>
                </div>
                <div>
                    <p><a href="{{ route('login') }}">Regresar al login</a></p>
                </div>
              </form>
          </div>
        </div>
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
