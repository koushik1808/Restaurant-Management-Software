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
  <div class="row position-relative justify-content-center overflow-hidden">
    <div class="col-3 d-none d-lg-block start-0 top-0">
      <div id="list-example" class="list-group pt-4">
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
    <div class="col-9 overflow-y-auto">
      <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example"
        tabindex="0">
        <h4 id="soup">Soup</h4>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Mushroom Soup
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 200.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Mushroom Soup
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 200.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Mushroom Soup
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 200.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Mushroom Soup
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 200.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <h4 id="v-starter">Veg Starter</h4>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chilli Panner
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 250.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chilli Panner
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 250.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chilli Panner
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 250.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chilli Panner
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 250.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <h4 id="nv-starter">Non-Veg Starter</h4>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chicken Kosha
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 300.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chicken Kosha
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 300.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body ps-2">
            <div class="card-title lead">
              <img src="{{ asset('image/veg.png') }}" class="img-fluid" alt="veg-logo">
              Chicken Kosha
            </div>
            <div class="hstack justify-content-between align-items-center">
              <p class="fw-bold ps-3 m-0">
                Rs 300.00
              </p>
              <button class="btn btn-success btn-lg">Add</button>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection