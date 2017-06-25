<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{trans('app.discovervr')}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    {{-- ar reikia <link rel="stylesheet" type="text/css" href="{{URL::asset('css/frontEndStyle.css')}}">--}}


    <link rel="stylesheet" type="text/css" href="{{asset('css/frontEndStyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

    {{--include user style?--}}

    <title>@yield('title')</title>
</head>
<body>
@include('front-end.menu')
@yield('content')


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('scripts')
</html>