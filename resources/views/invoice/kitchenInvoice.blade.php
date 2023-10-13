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
      <a href="{{route('Admin.Billing2',['id'=>$table->table])}}" class="btn btn-success" id="home-btn">Home</a>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <div class="card mx-auto" style="width:fit-content">
        <div class="card-body p-0 text-start">
          <p class="card-title text-uppercase fs-4 fw-bold" id="in-title">Bihari Bhaiya</p>
          <p class="fw-bold">Hotel &amp; Restaurant</p>
          <div class="vstack">
            <p class="m-0 fw-bold">Baluchar (Beside Kalyan Samity)</p>
            <p class="m-0 fw-bold">Satya Choudhury Indoor Stadium Building,</p>
            <p class="fw-bold">Malda West Bengal</p>
          </div>
          <p class="fw-bold">#Invoice id:- {{$table->billing_status}}</p>
          @if ($table->table)
          <p class="fw-bold">Table-No:{{$table->table}}</p>
          @else

          @endif

          <table class="table">
            <thead>
              <tr>
                <td class="fw-bold">SL.No</td>
                <td class="fw-bold">MenuItem</td>
                <td class="fw-bold">Quantity</td>
              </tr>
            </thead>
            <tbody>

              @php
              $i=0;
              @endphp
              @foreach ($billing_stack as $item)
              <tr>

                <td class="fw-bold">{{$i=$i+1}}</td>
                <td class="fw-bold">{{$item->manu}}</td>
                <td class="fw-bold"> {{$item->kot}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="vstack align-items-start">
            <hr class="w-100 border-2" />
            <p class="fs-3 d-none  w-100  fw-bold " id="message">Powered By <span>RestroRover</span>
            </p>
          </div>
        </div>
      </div>
      <button class="btn btn-primary my-4" id="print-btn">Print Order</button>

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