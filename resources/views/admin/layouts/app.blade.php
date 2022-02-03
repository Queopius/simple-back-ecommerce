<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('admin.common.partials.meta')

    @include('admin.common.partials.styles')

</head>
<body>
    <div id="app">

        @include('admin.common.partials.navbar')


        @include('admin.common.main')

        @include('sweetalert::alert')
    </div>
</body>
    @include('admin.common.partials.scripts')

</html>
