{{-- extend base layout --}}
@extends("includes.dashDefault")


{{-- hero section inserted --}}
@section('hero')
<div class="container">
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <td>Sl.No</td>
            <td>UserName</td>
            <td>UserPhone</td>
            <td>UserEmail</td>
            <td>UserStatus</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          @php
          $i=0;
          @endphp 
          @foreach ($user as $item)
          <tr>
            <td>{{$i=$i+1}}</td>
            <td>{{ $item->user_name}}</td>
            <td>{{ $item->user_phone}}</td>
            <td>{{ $item->user_email}}</td>
            @if ($item->status==0)
            <td>Active</td>
            @else
            <td>Lock</td> 
            @endif
            
            <td>
              <div class="d-flex gap-2">
                @if ($item->status==1)
                <a href="{{route('User.unlock_account',$item->id)}}" >
                <button class="btn btn-info">Active</button>
              </a>
                @else
                <a href="{{route('User.lock_account1',$item->id)}}" >
                <button class="btn btn-danger">Lock</button>
              </a>
                @endif
                @if ($item->user_roll==2)
                <a href="{{route('User.Upgrade_account',$item->id)}}" >
                  <button class="btn btn-info">Upgrade</button>
                </a>
                @else
                <a href="{{route('User.Degrade_account1',$item->id)}}" >
                <button class="btn btn-danger">Degrade</button>
                </a>
                @endif
               
              </div>
            </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
