{{-- extend default layout --}}

@extends('includes.dashDefault')

{{-- show bradcrumb --}}
@section('crumb','Lock Account')

{{-- show main layout --}}

@section('hero')
<div class="container-fluid">
   
  <div class="row gap-lg-4 gap-2 justify-content-center flex-column flex-sm-row">
    <div class="table-responsive-xl">
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Sl.No</td>
              <td>Email</td>
              <td>Phone</td>
              <td>Status </td>
                            
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($admin as $item)
            @if ($item->name =='Administrator')
           
            @else
            <tr>
              
                <td>{{$i=$i+1}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>

                @if ($item->lock_status==0)
                <td><button class="btn btn-primary" >Unlock</button></td>
                @else
                <td><button class="btn btn-danger">Lock</button></td>
                @endif

                @if ($item->lock_status)
                <td><a href="{{route('Admin.unlock_account',$item->id)}}"><button class="btn btn-primary" >Unlock</button></a></td>
                @else
                <td><a href="{{route('Admin.lock_account1',$item->id)}}"><button class="btn btn-danger" >Lock</button></a></td>
                @endif
              </tr>
            @endif
            
            @endforeach
            
          </tbody>
        </table>
      </div>

  </div>

</div>

@endsection