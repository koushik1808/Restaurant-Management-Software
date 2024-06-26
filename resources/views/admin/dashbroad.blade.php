{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Dashbroad')

{{-- show main layout --}}

@section('hero')
<div class="container-fluid">
  <div class="row mb-3">
    <div class="col py-3 d-flex gap-3">
      <input type="text" class="form-control rounded" placeholder="Search Table">
      <div class="btn btn-primary" onclick="update()">Search</div>
    </div>
  </div>
  <div class="row my-3">
    <div class="col">
      Select One Table To GO --
    </div>
  </div>
  <div class="row gap-lg-4 gap-2 justify-content-center flex-column flex-sm-row">
    @foreach ($table as $item)
    @if ($item->table)
    <a href="{{route('Admin.Billing2',['id'=>$item->id])}}"
      class=" card col col-lg-2 p-0 {{$item->status?"bg-danger":""}}" id="card"">
        <img src=" {{ asset('public/image/table.jpeg') }}" class="card-img-top" alt="table img">
      <div class="card-body">
        <div class="card-title text-center">
          TABLE T{{$item->table}}
        </div>
      </div>
    </a>
    @endif
   
    @endforeach

  </div>

</div>
<script>
  function update(){
    alert("Update package \nContact +91-7076299025 \nMail id info@procenturetech.com ");
  }
</script>
@endsection