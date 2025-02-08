@extends('layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">مدیریت نظرات</h2>

        <table class="w-full mt-4 border">
            <thead>
                <tr class="border-b bg-gray-200">
                    <th class="p-2">#</th>
                    <th class="p-2">کاربر</th>
                    <th class="p-2">متن نظر</th>
                    <th class="p-2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr class="border-b">
                        <td class="p-2">{{ $comment->id }}</td>
                        <td class="p-2">{{ $comment->user->name }}</td>
                        <td class="p-2">{{ $comment->body }}</td>
                        <td class="p-2">
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    </div>
@endsection
