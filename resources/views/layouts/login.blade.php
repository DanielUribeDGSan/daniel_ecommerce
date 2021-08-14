<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/login_style.css') }}" />
    <title>Sign in & Sign up Form</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>

<body>
    {{ $slot }}
    @livewireScripts

    
</body>

</html>
