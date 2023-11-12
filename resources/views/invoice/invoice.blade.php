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
          @if ($billing->name)
          <p class="fw-bold">Name :{{$billing->name}}</p>
          @else

          @endif
          @if ($billing->number)
          <p class="fw-bold">Number :{{$billing->number}}</p>
          @else

          @endif
          @if ($billing->ad)
          <p class="fw-bold">Address :{{$billing->ad}}</p>
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
              $dis=0;
              $gst1=0;
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
            @if ($gst->status)
            <p class="mb-2 fw-bold"> GST {{$gst->gst}}&percnt;</p>
                @php
                    $gst1=$total*($gst->gst/100);
                @endphp
            @else
                
            @endif
            @if ($discount->status)
            <p class="mb-2 fw-bold"> Discount {{$discount->discount}}&percnt;</p>
            @php
                $dis=$total*($discount->discount/100);
            @endphp
            @else
                
            @endif
           
            <p class="fw-bold">Net Amount Payable:{{round($total-$dis+$gst1)}}</p>
            <hr class="w-100 border-2" />
            <p class="fs-3 d-none  fw-bold " id="message">Thank You...<span>Visit Again</span> </p>
          </div>
        </div>
      </div>
      <button class="btn btn-primary my-4" id="print-btn"> Print Bill</button>
      

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