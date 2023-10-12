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
        <div class="card-body p-0 ps-1">
          <p class="card-title text-uppercase" id="in-title">Bihari Bhaiya</p>
          <p class="">Hotel &amp; Restaurant</p>
          <div class="vstack">
            <p class="m-0">Baluchar (Beside Kalyan Samity)</p>
            <p class="m-0">Satya Choudhury Indoor Stadium Building,</p>
            <p class="">Malda West Bengal</p>
          </div>
          <p class="text-start">#Invoice id:- {{$table->billing_status}}</p>
          @if ($table->table)
          <p class="">Table-No:{{$table->table}}</p>
          @else

          @endif

          <table class="table">
            <thead>
              <tr>
                <td class="">SL.No</td>
                <td class="">MenuItem</td>
                <td class="">Quantity</td>
              </tr>
            </thead>
            <tbody>

              @php
              $i=0;
              @endphp
              @foreach ($billing_stack as $item)
              <tr>

                <td class="">{{$i=$i+1}}</td>
                <td class="">{{$item->manu}}</td>
                <td class=""> {{$item->kot}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="vstack align-items-start">
            <hr class="w-100 border-2" />
            <p class="fs-2 d-none  w-100 text-center font-monospace " id="message">Powered By <span>RestroRover</span>
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