<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

</head>

<body class="hold-transition login-page">
    @yield('content')
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>