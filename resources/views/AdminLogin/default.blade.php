<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="public/assets/style.css" />
    @stack('style')
    <title>@yield('title')</title>
  </head>

  <body>
    <div class="main">
      @yield('hero')
    </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    {{-- <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script> --}}

    @stack('script')
  </body>

</html>