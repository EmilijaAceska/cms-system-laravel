@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>
    @if(session('deleted_category'))
        <div class="alert alert-danger">{{session('deleted_category')}}</div>
    @endif
    @if(session('updated_category'))
        <div class="alert alert-success">{{session('updated_category')}}</div>
    @endif

    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminCategoriesController@store']) !!}
            {{csrf_field()}}

              <div class="form-group">
                     {!! Form::label('name', 'Name:') !!}
                     {!! Form::text('name', null, ['class'=>'form-control'])!!}
              </div>


              <div class="form-group">
                    {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
              </div>

        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created date</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection
