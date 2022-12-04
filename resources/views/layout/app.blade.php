<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Create secret note') &mdash; Secretic</title>
    <meta name="description" content="Share a confidential note via a web link that will self-destruct after it is read by your intended recipient.">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/logo.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/logo.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/logo.png') }}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{ asset('assets/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Font for logo --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@1,900&display=swap" rel="stylesheet">
</head>
<body>

@include('layout.navbar')

@yield('content')

@include('layout.footer')
@include('layout.js_scripts')

@stack('scripts')

</body>
</html>
