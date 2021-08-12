<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <title>Inicio</title>
    
    

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

                <!-- TABLA -->
                <section class="content">
                    <div class="">
                        @yield('content')
                    </div>
                   
                </section>
                <!-- /.TABLA -->
            
        </div>
    </div>
</body>

</html>