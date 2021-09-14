<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="app">

    @include('includes.headerUser')

    <div id="content">
        @yield('content')
    </div>
</div>
</body>
</html>
