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
        @foreach ($gst as $item)


        @if ($item->status)
        <tr>
          <td>1</td>
          <td>Gst Invoice</td>
          <td class="fw-medium">Status: <span>ON</span></td>
          <td class="text-center">
            <a href="{{route('Admin.gstUpdate',['status'=>0])}}"> <button class="btn btn-warning">Off</button></a>

          </td>
        </tr>
        @else
        <tr>
          <td>1</td>
          <td>Gst Invoice</td>
          <td class="fw-medium">Status: <span>Off</span></td>
          <td class="text-center">
            <button class="btn btn-primary" data-bs-target="#gst-modal" data-bs-toggle="modal">On</button>

          </td>
        </tr>
        @endif
        @endforeach
        @foreach ($discount as $item)


        @if ($item->status)
        <tr>
          <td>2</td>
          <td>Festival Discount</td>
          <td class="fw-medium">Status: <span>ON</span></td>
          <td class="text-center">
            <a href="{{route('Admin.discountUpdate',['status'=>0])}}"> <button class="btn btn-warning">Off</button></a>

          </td>
        </tr>
        @else
        <tr>
          <td>2</td>
          <td>Festival Discount</td>
          <td class="fw-medium">Status: <span>Off</span></td>
          <td class="text-center">
            <button class="btn btn-primary" data-bs-target="#discount-modal" data-bs-toggle="modal">On</button>

          </td>
        </tr>
        @endif
        @endforeach


      </tbody>

    </table>
  </div>
  {{-- modal for gst --}}
  <div class="modal fade" id="gst-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Gst Informations</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="mb-3">
              <label for="" class="form-label">
                Add Gst Number:
                <input type="text" class="form-control">
              </label>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">
                Add Gst Parcent:
                <input type="text" class="form-control">
              </label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  {{-- modal discount --}}
  <div class="modal fade" id="discount-modal" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Discount Informations</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="mb-3">
              <label for="" class="form-label">
                Add Discount Name:
                <input type="text" class="form-control">
              </label>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">
                Add Discount Parcent:
                <input type="text" class="form-control">
              </label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection