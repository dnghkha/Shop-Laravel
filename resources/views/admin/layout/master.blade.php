<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.widget.head')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('admin.widget.menu')
            @include('admin.widget.topmenu')

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->
            @include('admin.widget.footer')

        </div>
    </div>

    @include('admin.widget.js')

</body>

</html>