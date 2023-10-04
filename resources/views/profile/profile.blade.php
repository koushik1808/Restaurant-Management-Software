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
    <div class="col-4">
      <img
        src="https://images.pexels.com/photos/15242091/pexels-photo-15242091/free-photo-of-man-posing-to-photo.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
        class="img-fluid rounded-cirle" alt="">
    </div>
    <div class="col-8">
      <div class="card w-75 p-3">
        <div class="card-title">
          Admin Profile
        </div>
        <div class="card-body">
          <form action="#">
            <div class="mb-3">
              <label for="" class="form-label">User Name</label>
              <input type="text" class="form-control" value="Admin">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Update Image</label>
              <input type="file" class="form-control">
            </div>

            <button class="btn btn-success mt-3" type="submit">Update</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection