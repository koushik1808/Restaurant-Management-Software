{{-- extend base layout --}}
@extends('includes.dashDefault')
@section('crumb',"Menus")

@section('hero')
<div class="container">
  <div class="row mb-3" style="height: 60px">
    <div class="col d-flex gap-3">
      <input type="text" class="form-control rounded" placeholder="Search Menu">
      <div class="btn btn-primary">Search Menu</div>
    </div>
  </div>
  {{-- menu started --}}
  <div class="row justify-content-center">
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
                    <a class="list-group-item list-group-item-action"
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
    <div class="col-3 d-none d-lg-block list-group pt-4" id="list-nav">
      @foreach ($catagory as $menus)
      <a class="list-group-item list-group-item-action text-truncate"
        href="#{{$menus->category}}">{{$menus->category}}</a>
      @endforeach

    </div>
    <div class=" col col-lg-9">
      <div data-bs-spy="scroll" data-bs-target="#list-nav" data-bs-smooth-scroll="true"
        class="scrollspy-example overflow-y-scroll" tabindex="0" id="scroll-menu">

        @foreach ($catagory as $cata)
        <div id="{{$cata->category}}">
          <h4>{{$cata->category}}</h4>
          @foreach ($menu as $menus)
          @if ($menus->category==$cata->category)
          <div class="card mb-3">
            <div class="card-body p-2">
              <div class="card-title lead m-0">
                <img src="{{ asset('public/image/veg.png') }}" class="img-fluid" alt="veg-logo">
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

  <div class="fixed-bottom w-25 ms-auto text-center">
    <button class="btn btn-warning rounded-circle z-1" data-bs-toggle="modal" data-bs-target="#cart-model">
      <i class='bx bxs-cart bx-md'></i>
    </button>
  </div>
  <div class="modal fade" id="cart-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg modal-fullscreen-md-down">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">MenuItems Cart</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>SL.No</td>
                  <td>Menu Code</td>
                  <td>Menu Name</td>
                  <td>Quantity</td>
                  <td>Price</td>
                  <td>Actions</td>
                </tr>
              </thead>
              <tbody>
                {{-- @php
                $i=0;
                @endphp
                @foreach ($billing_stack as $item)

                <tr>
                  <td>{{$i=$i+1}}</td>
                <td>{{$item->	manu_code}}</td>
                <td>{{$item->manu}}</td>
                <td>
                  <a href="{{route('Admin.count_add',['id'=>$item->id])}}"><button class="btn btn-secondary"><i
                        class='bx bx-plus'></i></button></a>
                  {{$item->count}}
                  <a href="{{route('Admin.count_sub',['id'=>$item->id])}}"><button class="btn btn-secondary"><i
                        class='bx bx-minus'></i></button></a>
                </td>
                <td>{{$item->price}}</td>
                <td><a href="{{route('Admin.delete_menu',['id'=>$item->id])}}"><button class="btn btn-danger"><i
                        class='bx bxs-trash'></i></button></a></td>
                </tr> --}}


                <tr>
                  <td>1</td>
                  <td>201</td>
                  <td>Mushromm </td>
                  <td><a href="#"><button class="btn btn-secondary"><i class='bx bx-plus'></i></button></a>
                    1
                    <a href="#"><button class="btn btn-secondary"><i class='bx bx-minus'></i></button></a>
                  </td>
                  <td>99.00</td>
                  <td><a href=""><button class="btn btn-danger"><i class='bx bxs-trash'></i></button></a></td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Checkout</button>
          <button type="button" class="btn btn-warning">Bill Total</button>
        </div>
      </div>
    </div>
  </div>



  {{-- test --}}
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
@push('script')
{{-- <script>
  var menu={{Js::from($menu)}}
console.log(menu)
</script> --}}

@endpush