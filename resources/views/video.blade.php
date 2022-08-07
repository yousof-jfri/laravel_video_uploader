@extends('layout.master')
@section('content')
<div class="w-screen h-screen flex items-center justify-center">
    <div class="w-3/6 p-5 bg-white shadow-xl rounded-xl">
        <video width="320" height="240" controls class="w-full h-auto rounded-xl object-cover">
            <source src="{{ Storage::url($video->video) }}" type="video/mp4">
            <source src="{{ Storage::url($video->video) }}" type="video/ogg">
            Your browser does not support the video tag.
        </video>
    </div>
</div>
@endsection