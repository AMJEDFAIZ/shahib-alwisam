@extends('layouts.site')


@section('title', $service->title)
@section('meta_title', $service->meta_title ?: $service->title)
@section('meta_description', $service->meta_description ?: Str::limit(strip_tags($service->description ?? ''), 160))
@section('meta_keywords', $service->title)

@section('content')
<div class="bg-gray-100 py-12 border-b">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-primary">{{ $service->title }}</h1>
        <nav class="text-sm mt-2 text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">الرئيسية</a> / <a href="{{ route('services.index') }}" class="hover:text-primary">الخدمات</a> / <span>{{ $service->title }}</span>
        </nav>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-sm p-8">
            @if($service->image_path)
            <div class="mb-8 rounded-lg overflow-hidden h-96">
                <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
            </div>
            @endif
            
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($service->description)) !!}
            </div>
        </div>
    </div>
</section>
@endsection
