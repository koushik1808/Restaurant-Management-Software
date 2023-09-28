@extends('AdminLogin.default')


@section('hero')
<div class="container-fluid p-0" id="gradient-back">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col">
      <div class="form-wrapper">
        <div class="form-card rounded border d-flex">

          <img src="{{ asset('public/image/auth.png') }}" alt=" auth image" class="flex-shrink-1">

          <form action="{{route('Admin.login_check')}}" method="POST"
            class="flex-shrink-1 w-100 py-4 px-2 d-flex  flex-column">
            @if (Session::has('fall'))
            <p class="form-text text-danger">{{Session::get('fall_password')}}</p>
            @endif
            @csrf

            <h2 class="text-center mb-3">LOGIN HERE</h2>
            <div class="my-3">
              <label for="" class="form-label">
                Email Id
              </label>
              <input type="email" class="form-control" placeholder="Enter User Email Id" name="email"
                value="{{old('email')}}">
              @if ($errors->has('email'))
              <p class="form-text text-danger">{{$errors->first('email')}}</p>
              @endif
              @if (Session::has('fall_email'))
              <p class="form-text text-danger">{{Session::get('fall_email')}}</p>
              @endif
            </div>
            <div class="mb-3">
              <label for="" class="form-label w-100 d-flex justify-content-between align-items-center">
                Password
                <i class='bx bxs-hide' id="eye"></i>
              </label>
              <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="password"
                value="{{old('password')}}">
              @if ($errors->has('password'))
              <p class="form-text text-danger">{{$errors->first('password')}}</p>
              @endif
              @if (Session::has('fall_password'))
              <p class="form-text text-danger">{{Session::get('fall_password')}}</p>
              @endif
            </div>
            <button class="btn btn-primary" type="submit"> Login</button>
          </form>
        </div>

      </div>



    </div>
  </div>
</div>

@endsection

@push('script')
<script src="{{url('public/assets/main.js')}}"></script>

@endpush


@push('style')
<link rel="stylesheet" href="{{ asset('public/assets/style.css') }}">

@endpush