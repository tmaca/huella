<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/lib/font-awesome/css/font-awesome.min.css">

    @include("elements.head")

    <title>
        @yield("title")
    </title>
</head>
<body>

    @include("elements.header")
    @include("elements.navbar")

    <div class="contaner">
        @yield("content")
    </div>

    @include("elements.footer")

</body>
</html>
