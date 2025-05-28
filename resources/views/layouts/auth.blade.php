<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="icon" href="{{ asset('appicon.ico')}}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen overflow-hidden">
    <main class="grid grid-cols-1 md:grid-cols-2 items-center h-screen">
        <div class="w-full h-full mx-auto">
            @yield('content')
        </div>
        <div class="hidden md:flex justify-end mt-5 mr-8 mb-5 h-[calc(100vh-40px)]">
            <img src="{{ asset('images/auth-background.png') }}" alt="Background Image" class="h-full object-contain">
        </div>
    </main>
</body>

</html>