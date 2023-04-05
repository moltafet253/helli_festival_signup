<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="./build/assets/app-67dcdfd2.css">
</head>

<body class="antialiased">
    <div id="app">
        main index
        <br>
        Name: {{ $dataFromController['name'] }}
        <br>
        Age: {{ $dataFromController['age'] }}
        <br>
        <example-component :data-from-controller="{{ json_encode($dataFromController) }}" />
    </div>
    <script src="./build/assets/app-1bdf67af.js"></script>
</body>

</html>
