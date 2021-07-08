<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>

    <!-- Bootstrap Core CSS -->
{{--    <link href="{{asset('css/app.css')}}" rel="stylesheet">--}}

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">


@yield('styles')


</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    @include('includes.admin_nav')

</div>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
{{--<script src="{{asset('js/libs.js')}}"></script>--}}

@yield('scripts')





</body>

</html>
