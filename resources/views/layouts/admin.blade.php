<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <nav class="bg-white p-4 shadow mb-4 flex justify-between">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">پنل مدیریت</a>
            <a href="{{ route('logout') }}" class="text-red-500">خروج</a>
        </nav>

        @yield('content')
    </div>
</body>
</html>
