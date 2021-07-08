@extends('layouts.blog-post')
@section('content')
    <div class="row">
        <div class="col-md-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">by {{$post->user->name}}</p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/700x200'}}" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">{!! $post->body !!}</p>

            <hr>

            <!-- Blog Comments -->
            @if(Auth::check())

            <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>

                    {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\PostCommentController@store']) !!}
                    {{csrf_field()}}

                         <div class="form-group">
                             <input type="hidden" name="post_id" value="{{$post->id}}">
                         </div>
                          <div class="form-group">
                                 {!! Form::label('body', 'Body:') !!}
                                 {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
                          </div>
                          <div class="form-group">
                                {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
                          </div>

                    {!! Form::close() !!}

                </div>
            @endif
            <hr>

            <!-- Posted Comments -->
            @if(count($comments) > 0)
            @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{Auth::user()->photo->file}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}

                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <!-- Nested Comment -->
                        <div class="media mx-4 px-4">
                            <a class="pull-left" href="#">
                                <img height="50" width="50px" class="media-object" src="{{Auth::user()->photo->file}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$reply->body}}
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                            @else
                            <h6 class="alert alert-danger pt-4">No Replies</h6>
                        @endif
                    @endforeach
                @endif
                </div>
                {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\PostCommentRepliesController@createReply']) !!}
                <div class="form-group">
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Reply:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            @endforeach
        </div> <!-- /END COL-MD-8 -->
        @include('includes.front_sidebar')
    </div> <!-- /END ROW -->
    @else
        <div class="bg-danger">
            Sorry! No Comments Available.
        </div>
    @endif



@endsection
