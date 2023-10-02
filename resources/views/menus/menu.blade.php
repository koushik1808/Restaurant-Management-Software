{{-- extend base layout --}}
@extends('includes.dashDefault')
@section('crumb',"Menus")

@section('hero')
<div class="container">
  <div class="row mb-3">
    <div class="col py-3 d-flex gap-3">
      <input type="text" class="form-control rounded" placeholder="Search Menu">
      <div class="btn btn-primary">Search Menu</div>
    </div>
  </div>
  {{-- menu started --}}
  <div class="row position-relative justify-content-center ">
    <div class="fixed-bottom z-9 d-lg-none">
      <button class="btn btn-danger fixed-bottom w-25 mx-auto" data-bs-target="#modal-menu" data-bs-toggle="modal">
        <i class='bx bxs-food-menu bx-md bx-tada-hover' style="color: #fff"></i>
      </button>


    </div>
    <div class="modal fade" id="modal-menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Menu Catagory</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div id="list-example" class="list-group pt-4" data-bs-dismiss="modal">
                    <a class="list-group-item list-group-item-action" href="#soup">Soup</a>
                    <a class="list-group-item list-group-item-action" href="#v-starter">Veg Starter</a>
                    <a class="list-group-item list-group-item-action" href="#nv-starter">Non-veg Starter</a>
                    <a class="list-group-item list-group-item-action" href="#fries">Fries</a>
                    <a class="list-group-item list-group-item-action" href="#v-in-main">Veg Indian Main-Course</a>
                    <a class="list-group-item list-group-item-action" href="#nv-in-main">Non-Veg Indian Main-Course</a>
                    <a class="list-group-item list-group-item-action" href="#v-ch-main">Veg Chinese Main-Course</a>
                    <a class="list-group-item list-group-item-action" href="#nv-ch-main">Non-Veg Chinese Main-Course</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="col-3 d-none d-lg-block">
      <div id="list-example" class="list-group pt-4">
        @foreach ($catagory as $menus)
        <a class="list-group-item list-group-item-action" href="#{{$menus->category}}">{{$menus->category}}</a>
        @endforeach
      </div>
    </div>
    <div class="col-9 h-25 overflow-y-hidden">
      <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example"
        tabindex="0">

        @foreach ($catagory as $cata)
        <div id="{{$cata->category}}">
          <h4>{{$cata->category}}</h4>
          @foreach ($menu as $menus)
          @if ($menus->category==$cata->category)
          <div class="card mb-3">
            <div class="card-body p-2">
              <div class="card-title lead m-0">
                <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
                {{$menus->Manu_name}}
              </div>
              <div class="hstack justify-content-between align-items-center">
                <p class="fw-bold ps-3 m-0">
                  Rs {{$menus->Manu_price}}.00
                </p>
                <button class="btn btn-success btn-lg">Add</button>
              </div>

            </div>
          </div>

          @endif

          @endforeach


        </div>

        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
  var menu={{Js::from($menu)}}
  console.log(menu)
</script>

@endpush