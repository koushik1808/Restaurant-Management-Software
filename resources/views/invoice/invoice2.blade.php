{{-- extend base layout --}}
@extends('includes.dashDefault')

{{-- crumb section --}}
@section('crumb')
Invoice

@endsection
@section('hero')
<div class="container">
  <div class="row">
    <div class="col">
      <a href="{{route('Admin.Billing2',['id'=>$table->table])}}" class="btn btn-success" id="home-btn">Back</a>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <div class="card mx-auto " style="width:fit-content">
        <div class="card-body p-0 text-start">
          <p class="card-title text-uppercase fw-bold fs-4" id="in-title">Bihari Bhaiya</p>
          <p class="fw-bold">Hotel &amp; Restaurant</p>
          <div class="vstack">
            <p class="m-0 fw-bold">Baluchar (Beside Kalyan Samity)</p>
            <p class="m-0 fw-bold">Satya Choudhury Indoor Stadium Building,</p>
            <p class="fw-bold">Malda West Bengal</p>
          </div>
          <p class="text-start fw-bold">#Invoice id:- {{$bill}}</p>
          <p class="fw-bold">Date :{{$date}}</p>
          @if ($table->name)
          <p class="fw-bold">Name :{{$table->name}}</p>
          @else

          @endif
          @if ($table->number)
          <p class="fw-bold">Number :{{$table->number}}</p>
          @else

          @endif
          @if ($table->ad)
          <p class="fw-bold">Address :{{$table->ad}}</p>
          @else

          @endif
          @if ($table->table)
          <p class="fw-bold">Table-No:{{$table->table}}</p>
          @else

          @endif

          <table class="table p-0">
            <thead>
              <tr class="p-0">
                {{-- <td>SL.No</td> --}}
                <td class="fw-bold">MenuItem</td>
                <td class="fw-bold">Price</td>
                <td class="fw-bold">Quantity</td>
                <td class="fw-bold">Amount</td>
              </tr>
            </thead>
            <tbody>
              @php
              $i=0;
              $total=0;
              @endphp
              @foreach ($billing_stack as $item)
              <tr>
                @php

                $total=$total+$item->count*$item->price;
                @endphp
                {{-- <td class="font-monospace">{{$i=$i+1}}</td> --}}
                <td class="fw-bold fs-6">{{$item->manu}}</td>
                <td class="fw-bold">{{$item->price}}</td>
                <td class="fw-bold"> {{$item->count}}</td>
                <td class="fw-bold"> {{$item->count*$item->price}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="vstack align-items-start">
            <p class="m-0 fw-bold">Total Amount:{{$total}}</p>
            <p class="mb-2 fw-bold">Festival Discount 10&percnt;</p>
            <p class="fw-bold">Net Amount Payable:{{round($total-$total*0.1)}}</p>
            <hr class="w-100 border-2" />
            <p class="fs-3 d-none  fw-bold " id="message">Thank You...<span>Visit Again</span> </p>
          </div>
        </div>
      </div>
      <a href="{{route('Admin.cancelBilling',['id'=>$table->table])}}"><button class="btn btn-primary my-4" > Cancel Billing</button></a>
      <a href="{{route('Admin.Billing_print2',['id'=>$table->table])}}"><button class="btn btn-primary my-4" > Complete Billing</button></a>
      

    </div>
  </div>
</div>

@endsection

@push('style')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700;900&display=swap');

  body {
    font-family: 'Roboto', sans-serif;
  }

  @media print {

    #header,
    #print-btn,
    .breadcrumb,
    #home-btn {
      display: none;
    }

    #message {
      display: block !important;
    }

    .card {
      width: 80mm !important;
      border: 0;
      position: fixed;
      top: 0;
      left: 0;
      overflow: hidden;
    }

    tr,
    td {
      padding: 0 !important;
      padding-right: 5px !important;
    }

  }
</style>

@endpush

@push('script')
<script>
  let printBtn=document.querySelector("#print-btn")
  printBtn.addEventListener("click",()=>{
    window.print()
  })
</script>

@endpush