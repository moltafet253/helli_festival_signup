<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سامانه ثبت آثار جشنواره علامه حلی(ره)</title>
    @vite(['resources/css/app.css','resources/sass/app.scss','resources/js/app.js'])
{{--    <link rel="stylesheet" href="./build/assets/app-72dc1432.css">--}}



</head>
<body class="antialiased">
<div id="app">
    <appheader></appheader>
    <underheader></underheader>
    <div class="px-16">
        <personalinfo :token="{{json_encode(session('token'))}}"></personalinfo>
        <contactinfo :token="{{ json_encode(session('token')) }}"></contactinfo>
        <educationalinfo :token="{{ json_encode(session('token')) }}"></educationalinfo>
        <teachinginfo :token="{{ json_encode(session('token')) }}"></teachinginfo>
        <bluewarn></bluewarn>
        <posts :token="{{ json_encode(session('token')) }}"></posts>
    </div>
</div>
{{--<script src="./build/assets/app-4d0b4cc0.js"></script>--}}
</body>
</html>
