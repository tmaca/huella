<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include("elements.head")

    <title>
        @yield("title", config("app.name"))
    </title>
</head>
<body>

    @include("elements.navbar")

    @if(Request::url() == route("landing"))
        @include("elements.header")
    @else
        <div class="navbar navbar-default"></div>
    @endif

    <main class="container-fluid" style="padding:0;">
        @yield("content")
    </main>

    @include("elements.footer")

    @include("elements.authModals")

</body>
</html>
