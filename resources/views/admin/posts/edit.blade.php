@extends('layouts.admin')






@section('content')


    <h1>Create Post</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">


            <div class="row">
                {!! Form::model($post,['method'=>'PUT', 'action'=> ['App\Http\Controllers\AdminPostsController@update', $post->id], 'files'=>true]) !!}
                {{csrf_field()}}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Description:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Updated Post', ['class'=>'btn btn-primary col-sm-6']) !!}
                </div>

                {!! Form::close() !!}
                {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\AdminPostsController@destroy',$post->id]]) !!}

                      <div class="form-group">
                            {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
                      </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>

@endsection

