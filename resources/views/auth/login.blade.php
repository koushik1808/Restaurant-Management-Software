@extends('includes.default')


@section('hero')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid"
          alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form class="py-3 p-md-0">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="form1Example13" class="form-control form-control-lg " />

          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label d-flex justify-content-between" for="form1Example23">
              <p>Password</p> <i class='bx bxs-low-vision bx-sm' id="hide-icon"></i>
            </label>
            <input type="password" id="form-pass" class="form-control form-control-lg" />

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