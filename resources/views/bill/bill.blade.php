{{-- extend base layout --}}
@extends('includes.dashDefault')

{{-- crumb section--}}
@section('crumb')
Add Bill

@endsection

{{-- hero section --}}

@section('hero')
<div class="container">
  <div class="row">
    <div class="w-25">
      <label for="" class="form-label">Invoice Number</label>
      <input type="text" class="form-control">

    </div>
  </div>
  <div class="row mb-3">
    <div class="col py-3 d-flex gap-3">
      <input type="text" class="form-control rounded" placeholder="Enter Menu Code">
      <div class="btn btn-primary">Add Item</div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <td>SL.No</td>
          <td>Menu Code</td>
          <td>Menu Name</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>123</td>
          <td>Mushroom Soup</td>
          <td>
            <button class="btn btn-secondary"><i class='bx bx-plus'></i></button>
            1
            <button class="btn btn-secondary"><i class='bx bx-minus'></i></button>
          </td>
          <td>230.00</td>
          <td><button class="btn btn-danger"><i class='bx bxs-trash'></i></button></td>
        </tr>
        <tr>
          <td>1</td>
          <td>123</td>
          <td>Mushroom Soup</td>
          <td>
            <button class="btn btn-secondary"><i class='bx bx-plus'></i></button>
            1
            <button class="btn btn-secondary"><i class='bx bx-minus'></i></button>
          </td>
          <td>230.00</td>
          <td><button class="btn btn-danger"><i class='bx bxs-trash'></i></button></td>
        </tr>
        <tr>
          <td>1</td>
          <td>123</td>
          <td>Mushroom Soup</td>
          <td>
            <button class="btn btn-secondary"><i class='bx bx-plus'></i></button>
            1
            <button class="btn btn-secondary"><i class='bx bx-minus'></i></button>
          </td>
          <td>230.00</td>
          <td><button class="btn btn-danger"><i class='bx bxs-trash'></i></button></td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
@endsection