{{-- extend base layout --}}
@extends('includes.dashDefault')


{{-- crumb the page --}}
@section('crumb')
Catagory

@endsection

{{-- hero section --}}

@section('hero')

<div class="container">
  <div class="row mb-3">
    <div class="col py-3 d-flex gap-3">
      <input type="text" class="form-control rounded" placeholder="Search Menu">
      <div class="btn btn-primary">Search Menu</div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <td>SL.No</td>
          <td>Catagory Name</td>
          <td>Menu Items</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Breakfast</td>
          <td>10</td>
          <td><a href="#" class="btn btn-warning"><i class='bx bxs-edit'></i></a>
            <a href="#" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>Breakfast</td>
          <td>10</td>
          <td><a href="#" class="btn btn-warning"><i class='bx bxs-edit'></i></a>
            <a href="#" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>Breakfast</td>
          <td>10</td>
          <td><a href="#" class="btn btn-warning"><i class='bx bxs-edit'></i></a>
            <a href="#" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>Breakfast</td>
          <td>10</td>
          <td><a href="#" class="btn btn-warning"><i class='bx bxs-edit'></i></a>
            <a href="#" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection