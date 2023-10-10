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
      <div class="card mx-auto " style="width:fit-content">
        <div class="card-body p-0 ps-1">
          <p class="card-title text-uppercase" id="in-title">Bihari Bhaiya</p>
          <p>Hotel &amp; Restaurant</p>
          <div class="vstack">
            <p class="m-0">Baluchar (Beside Kalyan Samity)</p>
            <p class="m-0">Satya Choudhury Indoor Stadium Building,</p>
            <p>Malda West Bengal</p>
          </div>
          <p class="text-start">#Invoice id:- {{$bill}}</p>
          <table class="table">
            <thead>
              <tr>
                {{-- <td>SL.No</td> --}}
                <td>MenuItem</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Amount</td>
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
                <td>{{$item->manu}}</td>
                <td>{{$item->price}}</td>
                <td> {{$item->count}}</td>
                <td> {{$item->count*$item->price}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="vstack align-items-start">
            <p class="m-0">Total Amount:{{$total}}</p>
            <p class="mb-1"> + GST 18 &percnt;</p>
            <p class="mb-2">Festival Discount 10&percnt;</p>
            <p class="fw-medium">Net Amount Payable:{{$total}}</p>
            <hr class="w-100 border-2" />
            <p class="fs-2 d-none  w-100 text-center font-monospace " id="message">Thank You Visit Again</p>
          </div>
        </div>
      </div>
      <button class="btn btn-primary my-4" id="print-btn">KOT Print</button>

    </div>
  </div>
</div>

@endsection

@push('style')
<style>
  #in-title {
    font-family: 'Times New Roman', Times, serif;
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
      width: 80mm;
      border: 0;
      position: fixed;
      top: 0;
      left: 0;
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