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
     
    </div>
    <div class="col-8">
      <div class="card w-75 p-3">
        <div class="card-title">
          @if (Session::get('LoginRoll') =='1')
          Admin Profile
          @else
          User Profile
          @endif
         
        </div>
        <div class="card-body">
          <form action="#">
            @foreach ($user as $item)
                
            @endforeach
            <div class="mb-3">
              <label for="" class="form-label">User Name</label>
              @if (Session::get('LoginRoll') =='1')
              <input type="text" class="form-control" value="admin">
              @else
              <input type="text" class="form-control" value="{{$user->user_name}}"> 
              @endif
              
            </div>
            <div class="mb-3">
              <label for="" class="form-label">User Phone</label>
              @if (Session::get('LoginRoll') =='1')
              <input type="text" class="form-control" value="0321">
              @else
              <input type="text" class="form-control" value="{{$user->user_phone}}">
              @endif
              
            </div>
            <div class="mb-3">
              
              @if (Session::get('LoginRoll')=='1')
          
              @else
              <label for="" class="form-label">User Email</label>
              <input type="text" class="form-control" value="{{$user->user_email}}">
              @endif
             
            </div>
           
            
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection