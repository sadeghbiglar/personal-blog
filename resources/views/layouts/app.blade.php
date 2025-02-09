<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'وبلاگ شخصی')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="{{ route('home') }}" class="text-2xl font-bold">وبلاگ شخصی</a>
    
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-200">صفحه اصلی</a></li>
                    @auth
                        <li><a href="{{ route('admin.dashboard') }}" class="hover:text-gray-200">پنل مدیریت</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="hover:text-gray-200">خروج</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-gray-200">ورود</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-gray-200">ثبت‌نام</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white text-center p-4 mt-4">
        <p>تمامی حقوق محفوظ است. | شبکه‌های اجتماعی: 
            <a href="#" class="text-blue-400 hover:underline">تلگرام</a> | 
            <a href="#" class="text-blue-400 hover:underline">اینستاگرام</a>
        </p>
    </footer>
    
</body>
</html>
