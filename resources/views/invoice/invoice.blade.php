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
      <a href="{{route('Admin.Dashbroad')}}" class="btn btn-success" id="home-btn">Home</a>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <div class="card mx-auto" style="width: fit-content">
        <div class="card-body">
          <p class="card-title fw-medium text-uppercase" id="in-title">Bihari Bhaiya</p>
          <p class="font-monospace text-end fw-bold">Hotel &amp; Restaurant</p>
          <div class="vstack">
            <p class="fw-bold m-0">Baluchar (Beside Kalyan Samity)</p>
            <p class="fw-bold m-0">Satya Choudhury Indoor Stadium Building,</p>
            <p class="fw-bold m-0">Malda West Bengal</p>
          </div>
          <p class="font-monospace text-start">#Invoice id:- {{$bill}}</p>
          <table class="table">
            <thead>
              <tr>
                <td class="font-monospace">SL.No</td>
                <td class="font-monospace">MenuItem</td>
                <td class="font-monospace">Price</td>
                <td class="font-monospace">Quantity</td>
                <td class="font-monospace">Amount</td>
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
                <td class="font-monospace">{{$i=$i+1}}</td>
                <td class="font-monospace">{{$item->manu}}</td>
                <td class="font-monospace">{{$item->price}}</td>
                <td class="font-monospace"> {{$item->count}}</td>
                <td class="font-monospace"> {{$item->count*$item->price}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="vstack align-items-start">
            <p class="m-0">Total Amount:{{$total}}</p>
            <p class="mb-1"> + GST 18 &percnt;</p>
            <p class="mb-2">Festival Discount 10&percnt;</p>
            <p class="fw-bold">Net Amount Payable:{{$total}}</p>
            <hr class="w-100 border-2" />
            <p class="fs-2 d-none  w-100 text-center font-monospace " id="message">Thank You Visit Again</p>
          </div>
        </div>
      </div>
      <button class="btn btn-primary my-4" id="print-btn">Print Bill</button>

    </div>
  </div>
</div>

@endsection

@push('style')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@1,700&display=swap');

  #in-title {
    font-family: 'Space Mono', monospace;
    font-weight: bolder
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
      border: 0;
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