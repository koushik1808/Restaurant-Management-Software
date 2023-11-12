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
        Add Menu
      </div>
      <div class="card-body">
        <form action="{{route('Admin.added_menu')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="" class="form-label">Menu Name </label>
            <input type="text" name="menu_name" @required(true) class="form-control">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Menu Catagory </label>
            <select name="menu_category" class="form-control">
              @foreach ($category as $item)
              <option>{{$item->category}}</option>
              @endforeach
              
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Menu Price </label>
            <input type="text" name="menu_price" @required(true) class="form-control">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Menu Description </label>
            <input type="text" name="menu_dis" class="form-control">
          </div>
          <button class="btn btn-success mt-3" type="submit">Add Menu</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection