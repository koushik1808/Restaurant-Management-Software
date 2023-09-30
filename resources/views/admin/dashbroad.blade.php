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
  <div class="row gap-4 flex-column flex-lg-row">
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -1
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -2
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -3
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -4
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -5
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -6
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -7
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -8
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -9
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -10
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -11
      </div>
    </div>
    <div class="card col col-lg-2 bg-success">

      <div class="card-body">
        Table -12
      </div>
    </div>
  </div>

</div>

@endsection