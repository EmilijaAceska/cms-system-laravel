@extends('layouts.admin')

@section('content')
    @if(session('deleted_user'))
        <div class="alert alert-danger">{{session('deleted_user')}}</div>
    @endif
    @if(session('updated_user'))
        <div class="alert alert-success">{{session('updated_user')}}</div>
    @endif
    <h1>Users</h1>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
          @if($users)
              @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
              @endforeach
          @endif
        </tbody>
      </table>
@endsection
