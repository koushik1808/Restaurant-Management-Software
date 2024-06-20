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
        <form action="{{route('Admin.Changed_Password')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="" class="form-label">Enter Old Password</label>
            <input type="text" name="oldPassword" @required(true) class="form-control">
            @if (Session::has('fall_password'))
            <p class="form-text text-danger">{{Session::get('fall_password')}}</p>
            @endif
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Enter New Password</label>
            <input type="text" name="newpassword" @required(true) class="form-control">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Confirm New Password</label>
            <input type="text" name="confirmpassword" @required(true) class="form-control">
            @if ($errors->has('confirmpassword'))
            <p class="form-text text-danger">{{$errors->first('confirmpassword')}}</p>
            @endif
          </div>
          <button class="btn btn-success mt-3" type="submit">Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection