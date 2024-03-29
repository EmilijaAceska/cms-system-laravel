<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS System</title>

    <!-- Bootstrap Core CSS -->
    {{--    <link href="{{asset('css/app.css')}}" rel="stylesheet">--}}

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
{{--    <link href="css/blog-post.css" rel="stylesheet">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
@include('includes.front_nav')
@include('includes.flash_messages')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div>

            @yield('content')

        </div>


    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; CodeHacking {{\Carbon\Carbon::now()->year}}</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->


<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
