<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سامانه ثبت آثار جشنواره علامه حلی(ره)</title>
    @vite(['resources/css/app.css','resources/sass/app.scss','resources/js/app.js'])

</head>
<body class="antialiased">
<div id="app">
    <appheader :token="{{json_encode(session('token'))}}"></appheader>
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
</body>
</html>
