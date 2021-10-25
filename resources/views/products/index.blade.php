@extends('products.layout')
@section('content')
 <div class="container py-5">
     <div class="row">
         <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
             <div class="card">
                 <div class="card-title"><br>
                     <h4 style="margin-left: 20px;">PRODUCT DETAILS
                         <a href="{{ route('products.create') }}" class="btn btn-success float-right" style="margin-right: 20px;">Add Product</a>
                     </h4>
                 </div>
                     <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for=""><strong>School:</strong></label>
                                    <select class="form-control @error('schoolname') is invalid @enderror" name="schoolname">
                                      <option value="">Select school</option>
                                        @foreach(App\Models\School::all() as $s)
                                      <option value="{{$s->name}}" selected="selected">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                            </div>
                                  
                             
                            <div class="col-6">
                                <div class="form-group">
                                    <label for=""><strong>Class:</strong></label>
                                    <select class="form-control @error('standard') is invalid @enderror" name="class">
                                      <option value="">Select class</option>
                                      @foreach(App\Models\Standard::all() as $std)
                                          <option value="{{$std->name}}" selected="selected">{{$std->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                            </div>
                        </div>
                 </div>
                 <div class="card-body">
                     <table class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Subject</th>
                                 <th>Book Name</th>
                                 <th>Publisher</th>
                                 <th>Image</th>
                                 <th>HSN No.</th>
                                 <th>GST</th>
                                 <th>Price</th>
                                 <th width="200px" style="text-align: center;">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach ($products as $product)
                            <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->subject }}</td>
                            <td>{{ $product->book_name }}</td>
                            <td>{{ $product->publisher }}</td>
                            <td><img src="{{ Storage::url($product->book_image) }}" height="75" width="75" alt="" /></td>
                            <td>{{ $product->hsn }}</td>
                            <td>{{ $product->gst }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a class="btn btn-success" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                            </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         </div>
        </div>   
@endsection