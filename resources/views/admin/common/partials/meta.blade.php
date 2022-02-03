<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">

<title>@yield('title', config('app.name'))</title>

