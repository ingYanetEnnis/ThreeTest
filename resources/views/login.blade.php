<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>



</head>

<body>


<div id="app">

</div>
<script src="{{ mix('/js/app.js') }}"></script>
<script  crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"/>
<!-- Load the JS SDK asynchronously -->
</body>
</html>
