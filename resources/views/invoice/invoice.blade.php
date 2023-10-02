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
      <a href="#" class="btn btn-success" id="home-btn">Home</a>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <div class="card mx-auto" style="width: fit-content">
        <div class="card-body">
          <p class="card-title fw-medium text-uppercase">Bihari Bhaiya</p>
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
              <tr>
                <td class="font-monospace">1</td>
                <td class="font-monospace">Soup</td>
                <td class="font-monospace">90.00</td>
                <td class="font-monospace">2</td>
                <td class="font-monospace">180</td>
              </tr>
            </tbody>
          </table>
          <div class="vstack align-items-start">
            <p>Total Sale:00.00</p>
            <p>Netpayble:00.00</p>
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