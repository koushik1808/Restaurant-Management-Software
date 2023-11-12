<div class="row py-2 px-2 justify-content-between text-white sticky-top" id="header">
  <div class="col col-md-5">
    <div class="d-flex h-100 gap-3 align-items-center">
      <button type="button" class="btn btn-warning d-md-none " aria-pressed="true" data-bs-target="#offcanvasExample"
        data-bs-toggle="offcanvas">
        Menus
      </button>
      <h3 class="m-0 ps-6 fw-bold">RestroRover</h3>
      <button class="btn text-light border border-2 border-light rounded-pill d-md-inline-flex d-none">
        <i class="bi bi-search"></i>
        <input type="text" id="nav-input" class="text-light" placeholder="Search" />
      </button>
    </div>
  </div>
  <!-- navbar menu -->
  <div class="navbar navbar-expand-md col p-0">
    <div class="container-fluid">
      <button class="navbar-toggler ms-auto outline-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbar-body" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2 m-md-0 justify-content-md-end" id="navbar-body">
        <ul class="navbar-nav flex-row">
          <div class="d-inline-flex gap-4 align-items-center nav-item">
            <div class="border-0">
              <input type="checkbox" id="mode" class="theme-checkbox" />
            </div>
          </div>
          <div class="dropdown d-md-inline-flex px-2 nav-item">
            <button href="#" class="btn border-0 dropdown-toggle text-light" data-bs-toggle="dropdown" type="button"
              aria-expanded="false">
              <img
                src="https://images.pexels.com/photos/18165273/pexels-photo-18165273.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                class="rounded rounded-circle" alt="" style="width: 30px; height: 30px" />
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{route('Admin.Profile')}}">Profile</a></li>
              @if (Session::get('LoginName') =='Administrator')
                  
              @else
              <li>
                <a class="dropdown-item" href="{{route('Admin.Change_Password')}}">Change Password</a>
              </li>
              @endif
              
              <li>
                <a class="dropdown-item" href="{{route('Admin.Logout')}}">Logout</a>
              </li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </div>
</div>