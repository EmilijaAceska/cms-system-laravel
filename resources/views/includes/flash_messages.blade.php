
@if(session('comment_message'))

    <div class="alert alert-success col-sm-6">
        <p>{{session('comment_message')}}</p>
    </div>
@endif
