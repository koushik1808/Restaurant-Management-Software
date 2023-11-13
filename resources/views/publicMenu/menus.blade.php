{{-- extend base layout --}}
@extends('includes.dashDefault')

@section('crumb')
Public Menus

@endsection

{{-- main section --}}
@section('hero')

<div class="container">
  <div class="row">
    <div class="fixed-bottom z-9 d-lg-none">
      <button class="btn btn-danger fixed-bottom w-25 mx-auto" data-bs-target="#modal-menu" data-bs-toggle="modal">
        <i class='bx bxs-food-menu bx-md bx-tada-hover' style="color: #ffffff"></i>
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
                    @foreach ($catagory as $menus)
                    <a class="list-group-item list-group-item-action text-truncate"
                      href="#{{$menus->category}}">{{$menus->category}}</a>
                    @endforeach
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
    <div class="col-3 d-none d-lg-block list-group pt-2" id="list-nav">
      @foreach ($catagory as $menus)
      <a class="list-group-item list-group-item-action text-truncate"
        href="#{{$menus->category}}">{{$menus->category}}</a>
      @endforeach

    </div>
    <div class=" col col-lg-9">
      <div data-bs-spy="scroll" data-bs-target="#list-nav" data-bs-smooth-scroll="true"
        class="scrollspy-example overflow-y-scroll" tabindex="0" id="scroll-menu">

        @foreach ($catagory as $cata)
        <div id="{{ $cata->category }}">
          <h4>{{ $cata->category }}</h4>
          @foreach ($menu as $menus)
          @if ($menus->category == $cata->category)
          <div class="card mb-3">
            <div class="card-body p-2">

              <div class="card-title lead m-0">
                <img src="{{ asset('public/image/veg.png') }}" class="img-fluid" alt="veg-logo">
                {{ $menus->Manu_name }}
              </div>
              <div class="hstack justify-content-between align-items-center">
                <p class="fw-bold ps-3 m-0">
                  Rs {{ $menus->Manu_price }}.00
                </p>
                <a href="{{route('Admin.public_menu_delete',['id'=>$menus->id])}}" ><button class="btn btn-danger">Delete</button></a>
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
@push('style')
<style>
  #list-nav,
  #scroll-menu {
    height: calc(100vh - 100px);
    overflow-y: scroll;
  }
</style>

@endpush