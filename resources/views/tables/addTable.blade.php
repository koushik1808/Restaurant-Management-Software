{{-- extend base layout --}}
@extends('includes.dashDefault')


{{-- crumb the page --}}
@section('crumb')
Catagory

@endsection

{{-- hero section --}}

@section('hero')

<div class="container">
  <div class="row mb-3">
    <div class="col py-3">
      <form action="" class="w-50 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title"> Add Table </h3>
            <div class="mb-3">
              <label for="" class="form-label">Table Name</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <select name="" class="form-select" id="">
                <option value="">Available</option>
                <option value="">Booked</option>
              </select>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
@push('script')


@endpush