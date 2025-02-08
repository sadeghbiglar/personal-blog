@extends('layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">مدیریت پست‌ها</h2>

        <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">افزودن پست جدید</a>

        <table class="w-full mt-4">
            <thead>
                <tr class="border-b">
                    <th class="p-2">#</th>
                    <th class="p-2">عنوان</th>
                    <th class="p-2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="border-b">
                        <td class="p-2">{{ $post->id }}</td>
                        <td class="p-2">{{ $post->title }}</td>
                        <td class="p-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-500">ویرایش</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
