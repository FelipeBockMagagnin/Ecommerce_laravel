<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="app">

    @include('includes.headerUser')

    <div >
        @yield('content')
    </div>
</div>
</body>
</html>
