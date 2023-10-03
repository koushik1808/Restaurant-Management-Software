@extends('includes.default')


@section('hero')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{ asset('public/image/login-logo.svg') }}" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="{{route('Admin.login_check')}}" method="post" class="py-3 p-md-0">
          <!-- Email input -->
          @csrf
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="form1Example13" name="email" class="form-control form-control-lg "
              value="{{old('email')}}" />
            @if ($errors->has('email'))
            <p class="form-text text-danger">{{$errors->first('email')}}</p>
            @endif
            @if (Session::has('fall_email'))
            <p class="form-text text-danger">{{Session::get('fall_email')}}</p>
            @endif
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label d-flex justify-content-between" for="form1Example23">
              <p>Password</p> <i class='bx bxs-low-vision bx-sm' id="hide-icon"></i>
            </label>
            <input type="password" name="password" id="form-pass" class="form-control form-control-lg" />
            @if ($errors->has('password'))
            <p class="form-text text-danger">{{$errors->first('password')}}</p>
            @endif
            @if (Session::has('fall_password'))
            <p class="form-text text-danger">{{Session::get('fall_password')}}</p>
            @endif
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>


        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('script')
<script>
  const eyeEl=document.querySelector("#hide-icon")
  const passEl=document.querySelector("#form-pass")
  eyeEl.addEventListener("click",()=>{
    if(passEl.getAttribute("type")=="text"){
      passEl.setAttribute("type","password")
    }
    else{
      passEl.setAttribute("type","text")
    }
  })
</script>

@endpush