{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Report')

{{-- show main layout --}}

@section('hero')
<div class="container-fluid">
  @if ($c)
  <div class="row my-3">
    <div class="col">
      <a href="#" class="btn btn-warning" data-bs-target="#dateModal" data-bs-toggle="modal">Custom Date</a>
    </div>
  </div>
  @else
      
  @endif
  
  @if ($b)
  <div class="row gap-lg-4 gap-2 justify-content-center flex-column flex-sm-row">
    <div class="table-responsive-xl">
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead class="table-warning">
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
            <td><a href="{{route('Admin.MenuRepoet',['id'=>$item->bill_no])}}">{{$item->bill_no}}</a></td>
            <td>{{$item->total_manu}}</td>
            <td>{{$item->total}}</td>
            <td>{{round($item->total-$item->total*0.1)}}</td>
            <td>{{$item->created_at}}</td>
          </tr>
          @endforeach
          <tr>

            <td></td>

            <td>Total Amount :-</td>
            <td>{{$total}}</td>
            <td>Total sales Amount :-</td>
            <td>{{round($total_sale)}}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
  @else
      
  @endif

  {{-- model for custom date --}}
  <div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
      <form action="{{route('Admin.customdate')}}" method="POST" class="w-100">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Enter Custom Date</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="" class="form-lable">
                From Date:
                <input type="date" name="FromDate" class="form-date" id="">
              </label>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">
                To Date:
                <input type="date" name="ToDate" class="form-date">
              </label>
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>

  </div>

</div>

@endsection