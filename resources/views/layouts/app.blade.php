<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'وبلاگ شخصی')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4 text-center">
        <h1 class="text-2xl">وبلاگ شخصی</h1>
    </header>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white text-center p-4 mt-4">
        <p>تمامی حقوق محفوظ است. | شبکه‌های اجتماعی من: <a href="#" class="text-blue-400">لینک‌ها</a></p>
    </footer>
</body>
</html>
