<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="app">

    @include('includes.headerAdmin')

    <div >
        @yield('content')
    </div>
</div>
</body>
</html>
