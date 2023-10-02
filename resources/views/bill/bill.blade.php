{{-- extend base layout --}}
@extends('includes.dashDefault')

{{-- crumb section--}}
@section('crumb')
Add Bill

@endsection

{{-- hero section --}}

@section('hero')
<div class="container">
  <form action="{{route('Admin.addMenu')}}" method="POST">
    @csrf
    <div class="row">
      <div class="w-25">
        <input type="text" name="tableno" hidden value="{{$table->table}}" class="form-control">
        <label for="" class="form-label">Invoice Number</label>
        @if ($table->billing_status)
        <input type="text" name="InvoiceNumbe" value="{{$table->billing_status}}" @readonly(true) class="form-control">
        @else
        <input type="text" name="InvoiceNumbe" id="bill_no" @readonly(true) class="form-control">
        @endif
      </div>
    </div>
    <div class="row mb-3">
      <div class="col py-3 d-flex gap-3">
        <input type="text" name="menu_code" class="form-control rounded" autofocus @required(true)
          placeholder="Enter Menu Code">
        @if (Session::has('fall_code'))
        <p class="form-text text-danger">{{Session::get('fall_code')}}</p>
        @endif
        <button class="btn btn-primary">Add Item</button>
      </div>
    </div>
</div>
</form>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <td>SL.No</td>
        <td>Menu Code</td>
        <td>Menu Name</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody>
      @php
      $i=0;
      @endphp
      @foreach ($billing_stack as $item)

      <tr>
        <td>{{$i=$i+1}}</td>
        <td>{{$item->	manu_code}}</td>
        <td>{{$item->manu}}</td>
        <td>
          <a href="{{route('Admin.count_add',['id'=>$item->id])}}"><button class="btn btn-secondary"><i
                class='bx bx-plus'></i></button></a>
          {{$item->count}}
          <a href="{{route('Admin.count_sub',['id'=>$item->id])}}"><button class="btn btn-secondary"><i
                class='bx bx-minus'></i></button></a>
        </td>
        <td>{{$item->price}}</td>
        <td><a href="{{route('Admin.delete_menu',['id'=>$item->id])}}"><button class="btn btn-danger"><i
                class='bx bxs-trash'></i></button></a></td>
      </tr>

      @endforeach

    </tbody>
  </table>
</div>
<div class="row my-4">
  <div class="col">
    <div class="d-flex gap-3 justify-content-center ">
      <a href="{{route('Admin.Dashbroad')}}"> <button class="btn btn-success">Checkout</button></a>
      <a href="{{route('Admin.Billing_print',['id'=>$table->table])}}"><button class="btn btn-warning">Bill
          Total</button></a>
    </div>
  </div>
</div>
</div>
<script>
  var d = new Date();
  var t = new Date().getTime();
  var randomnum = Math.floor(Math.random() * (1000 - 500000)) + 1000;
  randomnum = d.getFullYear() + d.getMonth() + d.getDate() + randomnum;
  randomnum = randomnum + t;
  console.log(randomnum);
  document.getElementById('bill_no').value = randomnum;
  
</script>
@endsection