@extends('products.layout')
  
@section('content')
<div class="container py-5">
  <div class="row">
    <div class="col-md-12">
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
          <h4>ADD PRODUCT
              <a href="{{ route('products.index') }}" class="btn btn-danger float-right" style="">Back</a>
            </h4>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col">
            <div class="form-group">
              <label for=""><strong>School:</strong></label>
              <select class="form-control @error('school_name') is invalid @enderror" name="school_name">
                <option value="">Select school</option>
                  @foreach(App\Models\School::all() as $s)
                <option value="{{$s->name}}">{{$s->name}}</option>
                  @endforeach
              </select>
            </div>
              </div>
              <div class="col">
            <div class="form-group">
              <label for=""><strong>Class:</strong></label>
              <select class="form-control @error('standard') is invalid @enderror" name="class">
                <option value="">Select class</option>
                @foreach(App\Models\Standard::all() as $std)
                    <option value="{{$std->name}}">{{$std->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
              </div>


            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for=""><strong>Subject:</strong></label>
                  <select class="form-control @error('subject') is invalid @enderror" name="subject">
                    <option value="">Select subject</option>
                    @foreach(App\Models\Subject::all() as $sub)
                        <option value="{{$sub->name}}">{{$sub->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for=""><strong>Book Name:</strong></label>
                  <input type="text" name="book_name" class="form-control">
              </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for=""><strong>Publisher:</strong></label>
                  <input type="text" name="publisher" class="form-control">
              </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="formFile" class="form-label"><strong>Image:</strong></label>
                      <input type="file" name="book_image" class="form-control">
                </div>
              </div>
            </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for=""><strong>HSN:</strong></label>
              <input type="text" name="hsn" class="form-control">
          </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for=""><strong>GST:</strong></label>
              <input type="text" name="gst" class="form-control">
          </div>
          </div>
        </div>

          <div class="row" style="width: 532px;">
            <div class="col">
              <div class="form-group">
                <label for=""><strong>Price:</strong></label>
                <input type="text" name="price" class="form-control">
            </div>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection