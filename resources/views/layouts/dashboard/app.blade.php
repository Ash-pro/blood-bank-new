<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">

    <title>{{__('site.Title_Name')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/css/main.css')}} ">
    {{-- Main jquery   --}}
    <script src="{{asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--    noty  --}}
    <link rel="stylesheet" href="{{asset('dashboard_files/plugin/noty/noty.css')}}">
    <script src="{{asset('dashboard_files/plugin/noty/noty.min.js')}}"></script>
{{--    <script src="{{asset('dashboard_files/plugin/noty/noty.js.')}}"></script>--}}

    <!-- Main CSS-->
    <style>
        label{
            font-weight: bold;
        }
    </style>
</head>
<body class="app sidebar-mini">

<!-- Navbar-->
@include('layouts.dashboard._header')

<!-- Sidebar menu-->
@include('layouts.dashboard._aside')

<main class="app-content">
    @include('dashboard.partials._session')

    @yield('content')

</main>
<!-- Essential javascripts for application to work-->
<script src="{{asset('dashboard_files/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/main.js')}}"></script>

{{--select2--}}
<script src="{{asset('dashboard_files/js/plugins/select2.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $(document).on('click','.delete',function (e) {
            e.preventDefault();

            var that = $(this);

            var n = new Noty({
                text: "Confirm Deleted Record ",
                killer: true,
                buttons:[
                    Noty.button('Yes','btn btn-success mr-2',function(){
                            that.closest('form').submit();
                        }),
                    Noty.button('No','btn btn-danger',function(){
                        n.close();
                    }),
                ]
            });
            n.show();
        });
    });


    //select2
    $('.select2').select2();
</script>

</body>
</html>
