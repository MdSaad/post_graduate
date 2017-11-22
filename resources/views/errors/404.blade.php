<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <title>404 not found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: lightblue;
            text-align: center;
        }
        h1 {
            color: red;
            font-size: 10em;
            margin-bottom: 0;
            text-shadow: 2px 3px 5px #4d0000;
        }
        p {
            font-size: 5em;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h1 class="animated zoomIn">404 NOT FOUND</h1>
    <p class="animated shake">back to <a href="{{ url('/') }}"><strong>DASHBOARD</strong></a></p>
</body>
</html>