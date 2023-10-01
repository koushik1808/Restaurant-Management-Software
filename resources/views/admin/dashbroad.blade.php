{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Dashbroad')

{{-- show main layout --}}

@section('hero')
<div class="container-fluid">
  <div class="row mb-3">
    <div class="col py-3 d-flex gap-3">
      <input type="text" class="form-control rounded" placeholder="Search Table">
      <div class="btn btn-primary">Search</div>
    </div>
  </div>
  <div class="row my-3">
    <div class="col">
      Select One Table To GO --
    </div>
  </div>
  <div class="row gap-lg-4 gap-2 justify-content-center flex-column flex-sm-row">
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T1
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">
      <div class="card-body">
        <div class="card-title text-center">
          TABLE T2
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T3
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T4
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T5
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T6
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T7
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T8
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T9
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T10
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T11
        </div>

      </div>
    </div>
    <div class="card col col-lg-2 p-0" id="card">
      <img src="{{ asset('image/table.jpeg') }}" class="card-img-top" alt="table img">

      <div class="card-body">
        <div class="card-title text-center">
          TABLE T12
        </div>

      </div>
    </div>
  </div>

</div>

@endsection