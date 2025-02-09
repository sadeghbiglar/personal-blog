<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto mt-8">
            @csrf
            <h2 class="text-2xl font-bold mb-4 text-center">ورود به حساب</h2>
        
            <div class="mb-4">
                <label for="email" class="block text-gray-700">ایمیل:</label>
                <input type="email" name="email" class="w-full border p-2 rounded focus:ring focus:ring-blue-300" required>
            </div>
        
            <div class="mb-4">
                <label for="password" class="block text-gray-700">رمز عبور:</label>
                <input type="password" name="password" class="w-full border p-2 rounded focus:ring focus:ring-blue-300" required>
            </div>
        
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 w-full rounded">ورود</button>
        </form>
        
    </x-authentication-card>
</x-guest-layout>
