@extends('layouts.site')

@section('content')
<div class="bg-gray-100 py-12 border-b">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-primary">{{ $post->title }}</h1>
        <nav class="text-sm mt-2 text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">الرئيسية</a> / <a href="{{ route('blog.index') }}" class="hover:text-primary">المدونة</a> / <span>{{ $post->title }}</span>
        </nav>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-lg shadow-sm p-8">
            @if($post->image_path)
            <div class="mb-8 rounded-lg overflow-hidden h-[400px]">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
            @endif
            
            <div class="flex items-center text-sm text-gray-500 mb-6 border-b pb-4">
                <div class="flex items-center ml-6">
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $post->published_at ? $post->published_at->format('Y-m-d') : $post->created_at->format('Y-m-d') }}
                </div>
            </div>

            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </div>
</section>
@endsection
