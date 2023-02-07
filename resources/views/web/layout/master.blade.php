<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('web.widget.head')
</head>

<body>

    <!-- Header Section Begin -->
    @include('web.widget.header')
    <!-- Header Section End -->

    <!-- Content Begin -->
    @yield('content')
    <!-- Content End -->

    <!-- Footer Section Begin -->
    @include('web.widget.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('web.widget.js')
</body>

</html>