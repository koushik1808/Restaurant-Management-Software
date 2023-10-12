{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Report')

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
    <div class="table-responsive-xl">
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Sl.No</td>
              <td>Bill No</td>
              <td>Total Menu</td>
              <td>Total Amount</td>
              <td>Time</td>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($billing as $item)
            <tr>
              <td>{{$i=$i+1}}</td>
              <td>{{$item->bill_no}}</td>
              <td>{{$item->total_manu}}</td>
              <td>{{$item->total}}</td>
              <td>{{$item->created_at}}</td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

  </div>

</div>

@endsection