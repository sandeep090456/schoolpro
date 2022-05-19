@extends('notebook.layout')
  
@section('content')
<div class="container py-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
      <div class="card">
        <div class="card-header">
          <h5>Add Details
              <a href="{{ route('notebook.index') }}" class="btn btn-danger float-right">Back</a>
            </h5>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
          <form action="{{ route('notebook.store') }}" method="POST">
              @csrf
              {{-- <input type="hidden" name="brand_id" value="{{$brand->id}}"> --}}
            <div class="form-group">
              <label for="">Brand:</label>
              <select class="form-control @error('brand_id') is invalid @enderror" name="brand_id">
                <option value="">Select brand</option>
                  @foreach(App\Models\Brand::all() as $brand)
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                  @endforeach
              </select>
            </div>
              
                <div class="form-group">
                  <label for="">Specification:</label>
                  <input type="text" name="specification" class="form-control">
              </div>
              
              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection