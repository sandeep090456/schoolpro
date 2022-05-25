@extends('project.layout')
@section('content')
 <div class="container py-5">
     <div class="row">
         <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
             
                 <div class="pull-left">
                     <h2>Notebook details</h2>
                 </div>
                    <div class="pull-right">
                        <a href="{{ route('project.create') }}" class="btn btn-success">Create</a>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Brand name</th>
                                        <th>Specification</th>
                                        <th>Page</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id}}</td>
                                        <td>{{ $project->brand_name }}</td>
                                        <td>{{ $project->spec_name }}</td>
                                        <td>{{ $project->pages }}</td>
                                        <td>
                                            <form action="{{ route('project.destroy',$project->id) }}" method="POST">
                                                <a href="{{ route('project.edit',$project->id) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="delete" style="border: none; background-color:transparent; color: red;"><i class="fa fa-trash-o"></i></button>
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