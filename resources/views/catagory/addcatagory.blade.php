{{-- extends base layout --}}
@extends('includes.dashDefault')


{{-- crumb section --}}

@section('crumb')
Add Catagory

@endsection

{{-- hero section --}}
@section('hero')
<div class="container">
  <div class="row justify-content-center">
    <div class="card w-75 p-3">
      <div class="card-title">
        Add Catagory
      </div>
      <div class="card-body">
        <form action="#">
          <label for="" class="form-label">Catagory Name</label>
          <input type="text" class="form-control">
          <label for="" class="form-label">Menu Items</label>
          <input type="text" class="form-control">
          <button class="btn btn-success mt-3" type="submit">Add Catagory</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection