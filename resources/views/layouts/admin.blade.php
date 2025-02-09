<!DOCTYPE html>
<html lang="fa" dir="rtl">
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
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">خروج</button>
            </form>
            
        </nav>

        @yield('content')
    </div>
</body>
</html>
