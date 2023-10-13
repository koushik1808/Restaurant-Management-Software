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
              <td>Total Item</td>
              <td> Amount</td>
              <td> Sales Amount</td>
              <td>Time</td>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            $total=0;
            $total_sale=0;
            @endphp
            @foreach ($billing as $item)
            <tr>
              @php
                   $total=$total+$item->total;
                  $total_sale=$total_sale+$item->total-$item->total*0.1;
              @endphp
              <td>{{$i=$i+1}}</td>
              <td>{{$item->bill_no}}</td>
              <td>{{$item->total_manu}}</td>
              <td>{{$item->total}}</td>
              <td>{{$item->total-$item->total*0.1}}</td>
              <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            <tr>
             
              <td></td>
              
              <td>Total Amount :-</td>
              <td>{{$total}}</td>
              <td>Total sales Amount :-</td>
              <td>{{$total_sale}}</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>

  </div>

</div>

@endsection