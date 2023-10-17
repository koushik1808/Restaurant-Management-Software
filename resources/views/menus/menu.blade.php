{{-- extend base layout --}}
@extends('includes.dashDefault')
@section('crumb', 'Menus')

@section('hero')
<div class="container">
  <form action="{{route('Admin.Add_Client')}}" method="POST">
    <div class="row my-3">
      @csrf
      <div class="col">
        <label for="" class="form-label">
          Client Name
          @if ($table->name)
          <input type="text" value="{{$table->name}}" name="ClientName" class="form-control">
          @else
          <input type="text"  name="ClientName" class="form-control">
          @endif
         
        </label>

      </div>
      <div class="col">
        <label for="" class="form-label">
          Client Phone
          @if ($table->number)
          <input type="text" value="{{$table->number}}" name="ClientPhone" class="form-control">
          @else
          <input type="text"  name="ClientPhone" class="form-control">
          @endif
          
        </label>

      </div>
      <input type="text" name="tableno" hidden value="{{$table->table}}" class="form-control">
      <div class="col">
        <label for="" class="form-label">
          Client Address
          @if ($table->ad)
          <input type="text" value="{{$table->ad}}" name="ClientAddress" class="form-control">
          @else
          <input type="text"  name="ClientAddress" class="form-control"> 
          @endif
          
        </label>
        <button type="submit" class="btn btn-success btn-lg">Add</button>
      </div>
      
    </div>
  </form>
  <form action="{{route('Admin.search_menu')}}" method="POST">
      <div class="row my-3">
    <div class="row my-3" style="height: 60px">
      <div class="col d-flex gap-3">


        @csrf
        <input type="text" name="tableno" hidden value="{{$table->table}}" class="form-control">
        <input type="text" class="form-control rounded" name="menu_name" placeholder="Search Menu">
        <div class="btn btn-primary"><button class="btn btn-primary">Search</button></div>

      </div>
    </div>
  </div>
  </form>
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
        <div id="{{ $cata->category }}">
          @if ($c==1)
          <h4>{{ $cata->category }} </h4>
          @else

          @endif
          @foreach ($menu as $menus)
          @if ($menus->category == $cata->category)
          <div class="card mb-3">
            <div class="card-body p-2">
              <form action="{{route('Admin.addMenu2')}}" method="POST">
                @csrf
                <div class="card-title lead m-0">
                  <img src="{{ asset('public/image/veg.png') }}" class="img-fluid" alt="veg-logo">
                  {{ $menus->Manu_name }}
                </div>
                <input type="text" name="tableno" hidden value="{{$table->table}}" class="form-control">
                <input type="text" name="menuid" hidden value="{{$menus->id}}" class="form-control">
                <div class="hstack justify-content-between align-items-center">
                  <p class="fw-bold ps-3 m-0">
                    Rs {{ $menus->Manu_price }}.00
                  </p>
                  <button class="btn btn-success btn-lg">Add</button>
                </div>
              </form>
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
    <button class="btn btn-warning rounded-circle z-1 position-relative" data-bs-toggle="modal"
      data-bs-target="#cart-model">
      <i class='bx bxs-cart bx-md'></i>
      <span class="badge position-absolute top-0 end-0 bg-danger rounded-circle">{{ $stackCount }}</span>
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
                @php
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
                    <a href="{{route('Admin.count_sub',['id'=>$item->id])}}" class="btn btn-secondary"><i
                        class='bx bx-minus'></i></a>
                  </td>
                  <td>{{$item->price}}</td>
                  <td><a href="{{route('Admin.delete_menu',['id'=>$item->id])}}" class="btn btn-danger">
                      <i class='bx bxs-trash'></i></a></td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <a href="{{route('Admin.Kitchen',['id'=>$table->table])}}" class="btn btn-info">KOT &amp; Print<i
              class='bx bxs-printer'></i></a>
          <a href="{{route('Admin.Dashbroad')}}" class="btn btn-success">Checkout</a>
          <a href="{{route('Admin.Billing_print',['id'=>$table->table])}}" class="btn btn-warning">Save  <i
              class='bx bxs-printer'></i>
          </a>
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


@endpush