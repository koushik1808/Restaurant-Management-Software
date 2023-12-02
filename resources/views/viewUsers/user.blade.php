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
            <td>UserStatus</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Abhijit</td>
            <td>Active</td>
            <td>
              <div class="d-flex gap-2">
                <button class="btn btn-info">View</button>
                <button class="btn btn-danger">Lock</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
  window.alert("this is alert box")
</script>

@endpush