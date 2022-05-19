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
          <h4>ADD TEXTBOOK
              <a href="{{ route('products.index') }}" class="btn btn-success float-right" style="margin-right: 20px;">Back</a>
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
              <label for="">School:</label>
              <select class="form-control @error('school_name') is invalid @enderror" name="school_id" id="school_id">
                <option value="">Select school</option>
                  @foreach(App\Models\School::all() as $s)
                <option value="{{$s->id}}">{{$s->name}}</option>
                  @endforeach
              </select>
            </div>
              </div>
              <div class="col">
            <div class="form-group">
              <label for="">Class:</label>
              <select class="form-control @error('standard') is invalid @enderror" name="class_id" id="stdId">
                <option value="">Select class</option>
                @foreach(App\Models\Standard::all() as $std)
                    <option value="{{$std->id}}">{{$std->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
              </div>


            <div class="row">
              <div class="col">
                <div class="form-group" id="subDiv">
                        <label for="otherField">Select subject</label>
                        <select class="form-control" id="otherField" name="stream">
                          <option>Select Stream</option>
                          <option>Science</option>
                          <option>Commerce</option>
                          <option>Humanitics</option>
                        </select>
                      </div>
            </div>
              <div class="col">
                <div class="form-group">
                <label for="">Subject:</label>
                  <input type="text" name="subject" class="form-control">
                  
                </div>
              </div>
              </div>
                <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Book Name:</label>
                  <input type="text" name="book_name" class="form-control">
              </div>
              </div>

            
              <div class="col">
                <div class="form-group">
                  <label for="">Publisher:</label>
                  <input type="text" name="publisher" class="form-control">
              </div>
              </div>
              </div>
              <!-- <div class="col">
                <div class="form-group">
                  <label for="formFile" class="form-label">Image:</label>
                      <input type="file" name="book_image" class="form-control">
                </div>
              </div> -->
            

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">HSN:</label>
              <input type="text" name="hsn" class="form-control">
          </div>
          </div>
            
            
          <div class="col">
            <div class="form-group">
              <label for="">GST:</label>
              <input type="text" name="gst" class="form-control">
          </div>
          </div>
          </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Price:</label>
                  <input type="text" name="price" class="form-control">
              </div>
              </div>
            </div>
          <div class="">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-md">Add Textbook</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
       $(document).ready(function() {
        $('#subDiv').hide();
         $('#stdId').on('change', function() {
            if (this.value == '11' || this.value == '12') {
               $('#subDiv').show();
            } else {
               $('#subDiv').hide();
            }
         });
      });
     </script>
@endsection