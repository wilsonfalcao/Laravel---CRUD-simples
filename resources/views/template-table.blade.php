
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap-3-5.min.css') }}" rel="stylesheet">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css'>
        <link rel='stylesheet' href='https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Title Page-->
        <title>@yield('title')</title>

    </head>

    <body>

     @yield('content')

     <!-- Scripts -->
     <script type="text/javascript" src="{{asset('js/jquery-3-6.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/bootstrap-3-7.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery-datatables.js')}}"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
     <script type="text/javascript" src="{{asset('js/crud.js')}}"></script>

    </body>

</html>