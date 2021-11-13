@extends('notebook.layout')
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
                 <div class="card-header"><br>
                     <h4 style="margin-left: 20px;">DETAILS
                         <a href="{{ route('notebook.create') }}" class="btn btn-success float-right" style="margin-right: 20px;">Add Notebook</a>
                     </h4>
                 </div>
                     
                 <div class="card-body">
                     <table class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Brand name</th>
                                 <th>Specification</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach ($notebooks as $notebook)
                            <tr>
                            <td>{{ $notebook->id }}</td>
                            <td>{{ $notebook->brand_name }}</td>
                            <td>{{ $notebook->specification }}</td>
                            <td>
                            <form action="{{ route('notebook.destroy',$notebook->id) }}" method="POST">
                            {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a href="{{ route('notebook.edit',$notebook->id) }}"><i class="fa fa-pencil"></i></a>
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" title="delete" style="border: none; background-color:transparent;"><i class="fa fa-trash"></i></button>
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