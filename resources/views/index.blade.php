<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ثبت نام جشنواره علامه حلی</title>
    @vite(['resources/css/app.css','resources/sass/app.scss','resources/js/app.js'])
</head>
<body class="antialiased">
    <div id="app">
        <appheader></appheader>
        <underheader></underheader>
        <personalinfo :datapersonal="{{json_encode($dataPersonal)}}"></personalinfo>
        <contactinfo :nationalcode="{{ json_encode(session('nationalcode')) }}"></contactinfo>
        <educationalinfo></educationalinfo>
        <teachinginfo></teachinginfo>
        <posts></posts>
    </div>
</body>
</html>
