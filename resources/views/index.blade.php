@extends('layout.master')
@section('content')
<div class="w-full md:p-10 p-5">
    <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
        <div class="col-span-1">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- header -->
                <div class="w-full p-5 bg-teal-400">
                    <h3 class="text-2xl text-white">پروژه آپلود ویدیو شما</h3>
                </div>

                <!-- body -->
                <div class="p-5">
                    <form method="post" action="{{ route('video.create') }}" enctype="multipart/form-data" id="upload">
                        <div class="my-3">
                            <input id="name" type="text" name="name" class="w-full rounded-xl border px-3 py-2 outline-none" placeholder="نام ویدیو">
                        </div>
                        <div class="my-3">
                            <button type="button" class="relative px-3 py-2 rounded-xl border bg-gray-50 hover:bg-gray-100 overflow-hidden">
                                <span>انتخاب فایل</span>
                                <input id="video-upload" name="file" type="file" class="w-screen absolute h-screen opacity-0 right-0 top-0">
                            </button>
                        </div>
                        <div class="my-3">
                            <button id="submit-button" class="px-3 py-2 bg-teal-400 text-white hover:bg-white border border-teal-400 hover:text-teal-500 rounded-xl duration-150">
                                <span>ثبت در دیتابیس</span>
                            </button>
                        </div>
                        <div class="my-3">
                            <div class="w-full h-5 rounded-xl bg-gray-100 overflow-hidden hidden duration-150" id="progress">
                                <div id="progress-bar" style="width: 0;" class=" bg-teal-400 h-full flex items-center justify-center text-white">
                                    <span id="progress-number">0%</span>
                                </div>
                            </div>
                            <div id="success-message" class="hidden w-full bg-green-400 rounded-xl p-5 text-center text-white mt-4">
                                <span class="text-xl">فایل با موفقیت آپلود شد</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- header -->
                <div class="w-full p-5 bg-teal-400">
                    <h3 class="text-2xl text-white">لیست ویدیو ها</h3>
                </div>
                <!-- body -->
                <div class="p-5">
                    <div class="w-full">
                        <div class="mt-5 p-5">
                            <div id="videos-container" class="w-full grid md:grid-cols-3 sm:grid-cols-2 grid-cols-2 gap-5">
                                @foreach ($videos as $video)     
                                    <div class="col-span-1">
                                        <div class="relative w-full h-32 bg-white border rounded-xl overflow-hidden text-center">
                                            <video width="320" height="240" class="h-5/7 object-cover">
                                                <source src="{{ Storage::url($video->video) }}" type="video/mp4">
                                                <source src="{{ Storage::url($video->video) }}" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                            <div class="w-full h-1/7 text-center flex items-center justify-center">
                                                <a href="{{ route('video.show', $video->id) }}">{{$video->title}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection