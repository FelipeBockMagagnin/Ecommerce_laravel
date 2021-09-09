<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="app">

    @include('includes.header')

    <div id="content">
        @yield('content')
    </div>
</div>
</body>
</html>
