<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($title)
            {{ $title }}
        @endisset
    </title>
    <!--favicon-->
    <link rel="icon" href="{{asset('storage/'.$siteInformation->ageny_youtube)}}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/apexcharts-bundle/css/apexcharts.css') }}" rel="stylesheet" />
    <!--Data Tables -->
    <link href="{{ asset('admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/dark-style.css') }}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

</head>
