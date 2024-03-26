<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="shortcut icon" href="images/logo1.jpg" type="image/x-icon">
    <title>MDC-GIS | @yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom styles -->
    <style>
        body {
            background-image: url('/images/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0; /* Reset body margin */
            padding: 0; /* Reset body padding */
        }

        @media (max-width: 640px) {
            body {
                background-size: 1000px auto !important;
            }
        }

        .wrapper {
            min-height: 100vh;
        }

        @if(Request::is('/')) /* Check if the current URL is the home page */
        body {
            background-color: rgba(0, 0, 0, 0.5); /* Darken the background for the home page */
        }
        @endif
    </style>
</head>
<body class="antialiased">
    <!-- Navbar -->
    @if (!Request::is('/')) <!-- Check if the current URL is not the home page -->
        <div class="navbar-wrapper">
            @include('normal-view.layout.navbar')
        </div>
    @endif

    <!-- Main content -->
    <div class="wrapper py-8 px-4 lg:px-0">
        @yield('content')
    </div>

    <!-- Additional scripts -->
    @yield('scripts')
</body>
</html>
