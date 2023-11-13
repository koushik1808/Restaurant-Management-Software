<div class="offcanvas offcanvas-start sidebar-nav text-dark" data-bs-scroll="true" data-bs-backdrop="false"
  data-bs-theme="dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h3 class="m-0">{{Session::get('LoginName')}}</h3>
    <button type="button" class="btn btn-danger btn ms-auto d-md-none" data-bs-dismiss="offcanvas" aria-label="Close">
      <i class='bx bxs-x-circle'></i>
    </button>
  </div>
  <div class="offcanvas-body p-0">

    <ul class="list-unstyled d-flex flex-column gap-3" id="sidebar-list">
      <li class="">
        <a href="{{route('Admin.Dashbroad')}}" class="btn">
          <span class="me-2">
            <i class="bi bi-grid-1x2-fill"></i>
          </span>
          Dashbroad
        </a>
      </li>
      <li>
        <a href="#" class="btn" data-bs-target="#ad-collapse" aria-controls="#ad-collapse" data-bs-toggle="collapse">
          <span class="me-2"><i class="bi bi-calendar2-x-fill"></i>
          </span>
          Catagorys
        </a>
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#ad-collapse"
          aria-expanded="false"></button>
        <ul class="collapse" id="ad-collapse">
          <li><a href="{{route('Admin.add_category')}}" class="btn">Add Catagory </a></li>
          <li><a href="{{route('Admin.view_category')}}" class="btn">Manage Catagory </a></li>
        </ul>
      </li>
      <li>
        <a href="#" class="btn" data-bs-target="#at-collapse" data-bs-toggle="collapse" aria-controls="#at-collapse">
          <span class="me-2"><i class="bi bi-calendar-check"></i></span>
          Menus
        </a>
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#at-collapse"
          aria-expanded="false"></button>
        <ul class="collapse" id="at-collapse">
          <li><a href="{{route('Admin.addNewMenu')}}" class="btn"> Add Menu </a></li>
          <li><a href="{{ route('Admin.public_menu') }}" class="btn"> See All Menus </a></li>
        </ul>
      </li>
      <li>
        <a href="#" class="btn" data-bs-target="#fe-collapse" data-bs-toggle="collapse" aria-controls="#fe-collapse">
          <span class="me-2"><i class="bi bi-cash-coin"></i></span>
          Tables Managment
        </a>
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#fe-collapse"
          aria-expanded="false"></button>
        <ul class="collapse" id="fe-collapse">
          <li><a href="#" class="btn"> Add Table </a></li>
          <li><a href="#" class="btn"> See All Tables </a></li>
          <li><a href="{{route('Admin.Dashbroad')}}" class="btn">Manage Tables</a></li>

        </ul>
      </li>
      <li>
        <a href="{{route('Admin.Billing2',['id'=>0])}}" class="btn border-0">
          <span class="me-2"><i class="bi bi-box-arrow-right"></i></span>
          Billing
        </a>
      </li>
      </li>
      <li>
        <a href="#" class="btn" data-bs-target="#report-collapse" aria-controls="#report-collapse"
          data-bs-toggle="collapse">
          <span class="me-2"><i class="bi bi-alipay"></i></span>
          Reports
        </a>
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#report-collapse"
          aria-expanded="false"></button>
        <ul class="collapse" id="report-collapse">
          <li><a href="{{route('Admin.todeyreport')}}" class="btn ">
              Today Report
            </a></li>
          <li>
            <a href="{{route('Admin.monthreport')}}" class="btn ">

              Last Monthly Report
            </a>
          </li>
          <li>
            <a href="{{route('Admin.customreport')}}" class="btn">
               Custom Reports
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a href="{{route('Admin.setting_view')}}" class="btn">
          <span class="me-2"><i class="bi bi-box-arrow-right"></i></span>
          Settings
        </a>
      </li>

      {{--
      <li>
        <a href="#" class="btn" data-bs-target="#st-collapse" data-bs-toggle="collapse" aria-controls="#st-collapse">
          <span class="me-2"><i class="bi bi-bezier"></i></span> Stock Managment
        </a>
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#st-collapse"
          aria-expanded="false"></button>
        <ul class="collapse" id="st-collapse">
          <li><a href="" class="btn"> Add Stock </a></li>
          <li><a href="" class="btn"> Manage Inventory </a></li>
        </ul>
      </li>
      <li>
        <a href="#" class="btn" data-bs-target="#stt-collapse" data-bs-toggle="collapse" aria-controls="#stt-collapse">
          <span class="me-2"><i class="bi bi-boxes"></i></span>
          Financial Reports
        </a>
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#stt-collapse"
          aria-expanded="false"></button>
        <ul class="collapse" id="stt-collapse">
          <li><a href="#" class="btn"> Monthly Reports </a></li>
          <li><a href="#" class="btn"> Growth Reports </a></li>
        </ul>
      </li> --}}

      <hr class="hr" />
      <li>
        <a href="{{route('Admin.Profile')}}" class="btn border-0">
          <span>
            <img
              src="https://images.pexels.com/photos/15242091/pexels-photo-15242091/free-photo-of-man-posing-to-photo.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              class="img rounded-circle" alt="" style="width: 30px; height: 30px" />
          </span>
          Profile
        </a>
      </li>
      @if (Session::get('LoginName') =='Administrator')

      @else
      <li>
        <a href="{{route('Admin.Change_Password')}}" class="btn border-0">
          <span class="me-2"><i class="bi bi-pass-fill"></i> </span>
          Change Password
        </a>
      </li>
      @endif

      @if (Session::get('LoginName') =='Administrator')
      <li>
        <a href="{{route('Admin.lock_account')}}" class="btn border-0">
          <span class="me-2"><i class="bi bi-pass-fill"></i> </span>
          Lock Accounts
        </a>
      </li>
      @else
      
      @endif

      <li>
        <a href="{{route('Admin.Logout')}}" class="btn border-0">
          <span class="me-2"><i class="bi bi-box-arrow-right"></i></span>
          Logout
        </a>
      </li>
    </ul>
  </div>
</div>

<style>
  .sidebar-nav {
    background: #f8f8f8;

  }

  #sidebar-list li {
    background: transparent;
    transition: 400ms ease;

  }

  #sidebar-list li a {
    color: #000
  }

  #sidebar-list li:hover {
    background-color: #78787879;

  }
</style>