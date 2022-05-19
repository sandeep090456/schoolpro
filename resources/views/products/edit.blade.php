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
          <h5>EDIT TEXTBOOK DETAILS
              <a href="{{ route('products.index') }}" class="btn btn-success float-right" style="margin-right: 20px;">Back</a>
            </h5>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
              
          @endif
          <form action="{{ route('products.update',$product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col">
          <div class="form-group">
            <label for="">School:</label>
            <select class="form-control @error('school_name') is invalid @enderror" name="school_id">
              <option value="" >Select school</option>
                @foreach(App\Models\School::all() as $s)
              <option value="{{$s->id}}" {{$s->id == old('s',$product->school_id) ? 'selected' : ''}}>{{ $s->name }} </option>
                @endforeach
            </select>
          </div>
            </div>
            <div class="col">
          <div class="form-group">
            <label for="">Class:</label>
            <select class="form-control @error('standard') is invalid @enderror" name="class_id">
              <option value="">Select class</option>
              @foreach(App\Models\Standard::all() as $std)
                  <option value="{{$std->id}}" {{$std->id == old('std',$product->class_id) ? 'selected' : ''}}>{{$std->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
            </div>


          <div class="row">
            <div class="col">
              <div class="form-group">
              <label for="">Subject:</label>
                  <input type="text" name="subject" class="form-control" value="{{ $product->subject }}">
                <!-- <label for=""><strong>Subject:</strong></label>
                <select class="form-control @error('subject') is invalid @enderror" name="subject">
                  <option value="">Select subject</option>
                  @foreach(App\Models\Subject::all() as $sub)
                      <option value="{{$sub->name}}" selected="selected">{{$sub->name}}</option>
                  @endforeach
                </select> -->
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Book Name:</label>
                <input type="text" name="book_name" class="form-control" value="{{ $product->book_name }}">
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Publisher:</label>
                <input type="text" name="publisher" class="form-control" value="{{ $product->publisher }}">
            </div>
            </div>
            <!-- <div class="col">
              <div class="form-group">
                <label for="formFile" class="form-label">Image:</label>
                    <input type="file" name="book_image" class="form-control">
              </div>
            </div> -->
          

      
        <div class="col">
          <div class="form-group">
            <label for="">HSN:</label>
            <input type="text" name="hsn" class="form-control" value="{{ $product->hsn }}">
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="">GST:</label>
            <input type="text" name="gst" class="form-control" value="{{ $product->gst }}">
        </div>
        </div>
      

        
          <div class="col">
            <div class="form-group">
              <label for="">Price:</label>
              <input type="text" name="price" class="form-control" value="{{ $product->price }}">
          </div>
          </div>
        </div>

          <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection