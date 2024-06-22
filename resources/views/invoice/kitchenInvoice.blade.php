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
      @if (Session::get('LoginRoll') =='1')
      <a href="{{route('Admin.Dashbroad')}}" class="btn btn-success" id="home-btn">Home</a>
      @else
      <a href="{{route('User.Dashbroad')}}" class="btn btn-success" id="home-btn">Home</a>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <div class="card mx-auto p-3 mt-3">
        <div class="card-body p-0 text-start">
          @if (Session::get('LoginRoll') =='1')
          <p class="card-title text-uppercase fw-bold fs-4" id="in-title">Admin</p>
          <p class="fw-bold">Hotel &amp; Restaurant Demo</p>
          <div class="vstack">

            <p class="fw-bold">Malda West Bengal</p>
            @else
            @foreach ($user as $item)
            <p class="card-title text-uppercase fw-bold fs-4" id="in-title">{{$item->Store}}(Jamai Hotel)</p>
            <div class="vstack">
              <p class="m-0 fw-bold">{{$item->Address}}</p>

            </div>
            @endforeach
            @endif
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
            <p class="fs-5 d-none  w-100  fw-bold " id="message">Powered By <span>RestroRover</span>
            </p>
          </div>
        </div>
      </div>
      @if (Session::get('LoginRoll') =='2')
      <button class="btn btn-primary my-4" onclick="update()"> Print Bill</button>
      @else
      <button class="btn btn-primary my-4" id="print-btn"> Print Bill</button>
      @endif

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
      width: auto !important;
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