@extends('project.layout')
  
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
              <a href="{{ route('project.index') }}" class="btn btn-danger float-right" style="">Back</a>
            </h5>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
          <form action="{{ route('project.update',$project->id) }}" method="POST">
              @csrf
              
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
                <select class="form-control @error('specification_id') is invalid @enderror" name="specification_id">
                  <option value="">Select specification</option>
                    @foreach(App\Models\Specification::all() as $specification)
                  <option value="{{$specification->id}}">{{$specification->spec_name}}</option>
                    @endforeach
                </select>
              </div>
              
                <div class="form-group">
                  <label for="">Pages:</label>
                  <input type="text" name="pages" class="form-control" value="{{$project->pages}}">
              </div>
              
              <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection