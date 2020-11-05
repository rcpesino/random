<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<>, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
 <div id="app">
<br>
    <random-component :random="{{ $random }}"/>
 </div>

</body>
<script src="{{ asset('js/app.js')}}"></script>
</html>