@php

    $whatsUp = setting('whatsUp_link');

@endphp

    <!DOCTYPE html>
<html lang="en">
<head>

    <title>Blood Bank System</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('homePage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('homePage/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('homePage/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('homePage/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('homePage/css/owl.carousel.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('homePage/css/tooplate-style.css')}}">

</head>
<style>
    .word{
        font-size: 200px !important;
        font-family: "Roboto", "Arial", "Tahoma", "Verdana", "sans-serif";
    }


</style>

<div class="jumbotron text-center">
    <h1 class="word">Thank You!</h1>
    <br><br><br><br><br><br><br><br><br>
    <p class="lead"><strong>We are received your Message</strong> Please wait for us to contact you very soon .</p>
    <hr>
    <br><br><br>
    <p>
        Having trouble? Call us in Whats App<br>
        <a href="https://api.whatsapp.com/send?phone={{$whatsUp}}"><img src="https://img.icons8.com/doodle/48/000000/whatsapp.png"/></a>
    </p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="{{route('welcome')}}" role="button">Continue to homepage</a>
    </p>
</div>



<!-- SCRIPTS -->
<script src="{{asset('homePage/js/jquery.js')}}"></script>
<script src="{{asset('homePage/js/bootstrap.min.js')}}"></script>
<script src="{{asset('homePage/js/jquery.parallax.js')}}"></script>
<script src="{{asset('homePage/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('homePage/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('homePage/js/magnific-popup-options.js')}}"></script>
<script src="{{asset('homePage/js/modernizr.custom.js')}}"></script>
<script src="{{asset('homePage/js/smoothscroll.js')}}"></script>
<script src="{{asset('homePage/js/custom.js')}}"></script>


</html>
