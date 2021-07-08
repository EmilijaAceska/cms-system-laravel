@extends('layouts.admin')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
@endsection

@section('content')

    <h1>Upload Media</h1>

    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminMediaController@store', 'class'=>'dropzone']) !!}
        {{csrf_field()}}
{{--        <div class="form-group">--}}
{{--            {!! Form::label('file', 'Upload:') !!}--}}
{{--            {!! Form::file('file', null, ['class'=>'form-control'])!!}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}--}}
{{--        </div>--}}

        {!! Form::close() !!}

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

@endsection
