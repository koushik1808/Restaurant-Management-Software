<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Restaurent Managment')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('public/assets/style.css') }}">
    @stack('style')
  </head>

  <body>
    <div class="container-fluid overflow-auto vh-100">
      {{-- header  --}}
      @include('includes.header')
      {{-- header end --}}

      {{-- sidebar --}}
      @include('includes.sidebar')
      {{-- sidebar end --}}

      {{-- main section --}}
      <main>
        <div class="container-fluid">
          <div class="row my-3">
            <div class="col">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item">@yield('crumb')</li>
              </ol>
            </div>
          </div>
        </div>
        @yield('hero')
      </main>
      {{-- end section --}}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    {{-- dark mode script --}}
    <script>
      const mode = document.querySelector("#mode");
        
        mode.addEventListener("click", () => {
        const nodeDoc = document.querySelector("html");
        if (nodeDoc.hasAttribute("data-bs-theme"))
        {
        nodeDoc.removeAttribute("data-bs-theme");
        }
        else {
        document.querySelector("html").setAttribute("data-bs-theme", "dark");
        }
        });
    </script>

    @stack('script')
  </body>

</html>


{{-- navbar sidebar defaults styles --}}

<style>
  @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap");

  :root {
    --sidebar-width: 270px;
    --navbar-bg: #384158;
  }

  body {
    font-family: "Inter", sans-serif;
  }

  #nav-input {
    border: 0;
    outline: none;
    background: transparent;
  }

  .navbar-bg {
    background: var(--navbar-bg) !important;
  }

  .sidebar-nav {
    width: 50% !important;
    /* top: 55px !important; */
  }

  .navbar-toggler[aria-expanded="true"] .sidebar-nav {
    top: 150px !important;
  }

  .offcanvas-body::-webkit-scrollbar {
    display: none;
  }

  lord-icon {
    width: 25px !important;
    height: 24px !important;
  }

  /* mode swicher */

  .theme-checkbox {
    --toggle-size: 8px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 6.25em;
    height: 3.125em;
    background: -webkit-gradient(linear,
        left top,
        right top,
        color-stop(50%, #efefef),
        color-stop(50%, #2a2a2a)) no-repeat;
    background: -o-linear-gradient(left, #efefef 50%, #2a2a2a 50%) no-repeat;
    background: linear-gradient(to right, #efefef 50%, #2a2a2a 50%) no-repeat;
    background-size: 205%;
    background-position: 0;
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    border-radius: 99em;
    position: relative;
    cursor: pointer;
    font-size: var(--toggle-size);
  }

  .theme-checkbox::before {
    content: "";
    width: 2.25em;
    height: 2.25em;
    position: absolute;
    top: 0.438em;
    left: 0.438em;
    background: -webkit-gradient(linear,
        left top,
        right top,
        color-stop(50%, #efefef),
        color-stop(50%, #2a2a2a)) no-repeat;
    background: -o-linear-gradient(left, #efefef 50%, #2a2a2a 50%) no-repeat;
    background: linear-gradient(to right, #efefef 50%, #2a2a2a 50%) no-repeat;
    background-size: 205%;
    background-position: 100%;
    border-radius: 50%;
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
  }

  .theme-checkbox:checked::before {
    left: calc(100% - 2.25em - 0.438em);
    background-position: 0;
  }

  .theme-checkbox:checked {
    background-position: 100%;
  }

  /* mode swichter end */

  @media screen and (min-width: 768px) {
    .sidebar-nav {
      width: var(--sidebar-width) !important;
      transform: none !important;
      visibility: visible;
      top: 58px !important;
    }

    main {
      margin-left: var(--sidebar-width);
    }
  }
</style>