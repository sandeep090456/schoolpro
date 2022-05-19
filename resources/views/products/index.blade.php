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
                     <h4 style="margin-left: 20px;">TEXTBOOK DETAILS
                         <a href="{{ route('products.create') }}" class="btn btn-success float-right" style="margin-right: 20px;">Add Textbook</a>
                     </h4>
                 </div>
                     <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                
                                <div class="form-group">
                                    <label for="">School:</label>
                                    <select class="form-control @error('schoolname') is invalid @enderror filter-input" name="school_id" onchange="listschool(this)" id="school_id">
                                      <option value="0" selected>Select school</option>
                                        @foreach(App\Models\School::all() as $s)
                                      <option value="{{$s->id}}" >{{$s->name}}  </option>
                                        @endforeach
                                    </select>
                                  </div>
                            </div>
                            
                             
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Class:</label>
                                    <select class="form-control @error('standard') is invalid @enderror filter-input" name="class_id" id="class_id" onchange="listclass(this)">
                                      <option value="0" selected>Select class</option>
                                      @foreach(App\Models\Standard::all() as $std)
                                          <option value="{{$std->id}}">{{$std->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                            </div>
                        </div>
                 </div>
                 <div class="card-body">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Stream</th>
                                 <th>Subject</th>
                                 <th>Book Name</th>
                                 <th>Publisher</th>
                                 <th>HSN</th>
                                 <th>GST</th>
                                 <th>Price</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         
                         <tbody>
                            @foreach ($products as $product)
                            <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->stream }}</td>
                            <td>{{ $product->subject }}</td>
                            <td>{{ $product->book_name }}</td>
                            <td>{{ $product->publisher }}</td>
                            <td>{{ $product->hsn }}</td>
                            <td>{{ $product->gst }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                            <form action="{{ route('products.destroy',[$product->id]) }}" method="POST">
                            <a href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"title="delete" style="border: none; background-color:transparent;"><i class="fa fa-trash"></i></button>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type='text/javascript'>
            function listschool(e){
                e.preventDefault()
                var school_id = $(e).val();
                window.location.href = '/books_list?school_id='+school_id
            }

            function listclass(e){
                var school_id = $('#school_id').val();
                var class_id = $(e).val();
                window.location.href = '/products_list?school_id='+school_id+'&class_id='+class_id
            }
 
      
      </script>

@endsection