<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ثبت نام جشنواره علامه حلی</title>
    @vite(['resources/css/app.css','resources/scss/app.scss','resources/js/app.js'])
</head>

<body class="antialiased">
    <div id="app">
        <Header />
        <Header2 />
        <Personal_Info />
        <Contact_Info />
        <Teaching_Info />
        <Blue_Warn />
        <Posts />
    </div>
</body>
</html>
