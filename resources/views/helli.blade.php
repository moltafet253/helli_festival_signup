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
    <appheader></appheader>
    <underheader></underheader>
    <div class="px-16">
        <personalinfo :datapersonal="{{json_encode($dataPersonal)}}"></personalinfo>
        <contactinfo :nationalcode="{{ json_encode(session('nationalcode')) }}"></contactinfo>
        @php
            $edudata = array('nationalcode' => session('nationalcode'), 'gender' => session('gender'));
        @endphp
        <educationalinfo :nationalcode="{{ json_encode($edudata) }}"></educationalinfo>
        <teachinginfo :nationalcode="{{ json_encode(session('nationalcode')) }}"></teachinginfo>
        <bluewarn></bluewarn>
        <posts :nationalcode="{{ json_encode(session('nationalcode')) }}"></posts>
    </div>
</div>
</body>
</html>