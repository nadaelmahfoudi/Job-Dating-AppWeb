
@extends('entreprises.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('entreprises.create') }}"> Create New company</a>
            </div>
        </div>
    </div>
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Location</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($entreprises as $entreprise)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $entreprise->name }}</td>
            <td>{{ $entreprise->location }}</td>
            <td>{{ $entreprise->details }}</td>
            <td>
                <form action="{{ route('admin.entreprises.destroy',$entreprise->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('admin.entreprises.show',$entreprise->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('admin.entreprises.edit',$entreprise->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $books->links() !!}
      
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New company</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.entreprises.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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
 
@endsection
