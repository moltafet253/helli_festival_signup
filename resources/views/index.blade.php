<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        <personalinfo></personalinfo>
        <contactinfo></contactinfo>
        <educationalinfo></educationalinfo>
        <teachinginfo></teachinginfo>
        <bluewarn></bluewarn>
        <posts></posts>
    </div>
</body>
</html>
