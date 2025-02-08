@extends('layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">مدیریت کاربران</h2>

        <table class="w-full mt-4 border">
            <thead>
                <tr class="border-b bg-gray-200">
                    <th class="p-2">#</th>
                    <th class="p-2">نام</th>
                    <th class="p-2">ایمیل</th>
                    <th class="p-2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="p-2">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection
