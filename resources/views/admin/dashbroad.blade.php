{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Dashbroad')

{{-- show main layout --}}

@section('hero')
<div class="container-fluid">
  <div class="row gap-2 flex-column flex-lg-row">
    <div class="card text-bg-primary mb-3 col">
      <div class="card-header">Students</div>
      <div class="card-body">
        <h5 class="card-title">5000</h5>
        <p class="card-text">Students Admitted</p>
      </div>
    </div>
    <div class="card text-bg-warning mb-3 col">
      <div class="card-header">Techers</div>
      <div class="card-body">
        <h5 class="card-title">345</h5>
        <p class="card-text">Techers Presented</p>
      </div>
    </div>
    <div class="card text-bg-danger mb-3 col">
      <div class="card-header">Staffs</div>
      <div class="card-body">
        <h5 class="card-title">156</h5>
        <p class="card-text">Staffs On Services</p>
      </div>
    </div>
    <div class="card text-bg-success mb-3 col">
      <div class="card-header">Bus</div>
      <div class="card-body">
        <h5 class="card-title">10</h5>
        <p class="card-text">Buses on Routes</p>
      </div>
    </div>
  </div>
  <div class="row my-3 d-none d-lg-flex">
    <table class="table table-striped col" id="myTable">
      <thead>
        <td>SL.No</td>
        <td>Student Name</td>
        <td>Age</td>
        <td>Gurdian</td>
        <td>Phone</td>
        <td>Class</td>
      </thead>
    </table>
  </div>
</div>

@endsection