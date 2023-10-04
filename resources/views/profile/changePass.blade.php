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
        Change Password
      </div>
      <div class="card-body">
        <form action="#">
          <div class="mb-3">
            <label for="" class="form-label">Enter Old Password</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Enter New Password</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Confirm New Password</label>
            <input type="text" class="form-control">
          </div>
          <button class="btn btn-success mt-3" type="submit">Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection