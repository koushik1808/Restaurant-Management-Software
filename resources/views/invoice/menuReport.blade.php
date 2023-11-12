{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Menu Report')

{{-- show main layout --}}

@section('hero')
<div class="container-fluid">
   
  <div class="row gap-lg-4 gap-2 justify-content-center flex-column flex-sm-row">
    <div class="table-responsive-xl">
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Sl.No</td>
              <td>Bill No</td>
              <td>Menu Name</td>
              <td>Total Menu </td>
              <td>Total  Amount</td>
              
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($billing_stack as $item)
            <tr>
              
              <td>{{$i=$i+1}}</td>
              <td>{{$item->billing_no}}</td>
              <td>{{$item->manu}}</td>
              <td>{{$item->count}}</td>
              <td>{{$item->price*$item->count}}</td>
             
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>

  </div>

</div>

@endsection