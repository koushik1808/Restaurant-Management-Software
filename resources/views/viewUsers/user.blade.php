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
                <button class="btn btn-info">View</button>
                <button class="btn btn-danger">Lock</button>
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
