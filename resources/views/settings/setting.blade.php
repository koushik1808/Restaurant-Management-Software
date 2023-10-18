{{-- import base layout --}}
@extends('includes.dashDefault')


{{-- crumb tittle --}}
@section('crumb')
Settings
@endsection

@section('hero')
<div class="container">
  {{-- <div class="row">
    <div class="col">thi is settings</div>
  </div> --}}
  <div class="table-responsive">
    <table class="table">
      {{-- <thead class="table-primary">
        <tr>
          <td>SL.No</td>
          <td>Setting Name</td>
          <td>Setting Status</td>
          <td>Actions</td>
        </tr>
      </thead> --}}

      <tbody>
        <tr>
          <td>1</td>
          <td>Gst Invoice</td>
          <td class="fw-medium">Status: <span>ON</span></td>
          <td class="text-center">
            <button class="btn btn-primary">On</button>
            <button class="btn btn-warning">Off</button>

          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Festival Discount</td>
          <td class="fw-medium">Status: <span>ON</span></td>
          <td class="text-center">
            <button class="btn btn-primary">On</button>
            <button class="btn btn-warning">Off</button>

          </td>
        </tr>
      </tbody>

    </table>
  </div>
</div>
@endsection