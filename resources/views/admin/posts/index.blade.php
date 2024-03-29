@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>
    @if(session('deleted_post'))
        <div class="alert alert-danger">{{session('deleted_post')}}</div>
    @endif
    @if(session('updated_post'))
        <div class="alert alert-success">{{session('updated_post')}}</div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>User</th>
            <th>Category</th>
            <th>Post link</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
          @foreach($posts as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
            <td><a href="{{route('admin.comments.index',$post->id)}}">Comments</a></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@endsection
