@extends('layouts.dashboard')
@section('content')
<div>
    <div>
        <div>
            <h2>Add New Post</h2>
        </div>
        <div>
            <a href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div>
        <strong>มีข้อผิดพลาด!</strong> ตรวจสอบข้อมูลในโพสต์ให้ถูกต้อง<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div>
        <div>
            <div>
                <strong>หัวเรื่อง:</strong>
                <input type="text" name="title" placeholder="หัวเรื่อง">
            </div>
        </div>
        <div>
            <div>
                <strong>รายละเอียด:</strong>
                <textarea style="height:150px;" name="detail" placeholder="รายละเอียด"></textarea>
            </div>
        </div>
        <div>
            <div>
                <strong>ภาพ:</strong>
                <input type="file" name="image" placeholder="image">
            </div>
        </div>
        <div>
               <button type="submit">ส่งโพสต์</button>
        </div>
    </div>
</form>
@endsection
