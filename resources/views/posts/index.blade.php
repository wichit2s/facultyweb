@extends('layouts.dashboard')

@section('content')
    <div>
        <div>
            <div>
                <h2>โพสต์สำคัญของคณะ</h2>
            </div>
            <div>
                <a href="{{ route('posts.create') }}" class="text-blue-800"> สร้างโพสต์ใหม่</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex">
        @foreach ($posts as $post)
        <div>
            <h3 class="text-sm">{{ $post->title }}</h3>
            <img src="/image/{{ $post->image }}" alt="post image"/>
            <p>{{ $post->detail }}</p>
        </div>
        @endforeach
    <div>

    {!! $posts->links() !!}

@endsection

