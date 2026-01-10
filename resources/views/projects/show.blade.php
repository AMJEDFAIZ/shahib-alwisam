@extends('layouts.site')

@section('meta_title', $project->meta_title ?: $project->title)
@section('meta_description', $project->meta_description ?: Str::limit(strip_tags($project->description ?? ''), 160))
@section('meta_keywords', $project->title)


@section('content')
<div class="bg-gray-100 py-12 border-b">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-primary">{{ $project->title }}</h1>
        <nav class="text-sm mt-2 text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">الرئيسية</a> / <a href="{{ route('projects.index') }}" class="hover:text-primary">المشاريع</a> / <span>{{ $project->title }}</span>
        </nav>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-sm p-8 mb-12">
            @if($project->main_image)
            <div class="mb-8 rounded-lg overflow-hidden h-[500px]">
                <img src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2">
                    <h2 class="text-2xl font-bold text-primary mb-4">تفاصيل المشروع</h2>
                    <div class="prose max-w-none text-gray-700 leading-relaxed mb-8">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-primary mb-4 border-b pb-2">معلومات المشروع</h3>
                        <ul class="space-y-4">
                            @if($project->location)
                            <li class="flex items-start">
                                <span class="font-bold text-gray-700 w-24">الموقع:</span>
                                <span class="text-gray-600 flex-1">{{ $project->location }}</span>
                            </li>
                            @endif
                            @if($project->scope)
                            <li class="flex items-start">
                                <span class="font-bold text-gray-700 w-24">النطاق:</span>
                                <span class="text-gray-600 flex-1">{{ $project->scope }}</span>
                            </li>
                            @endif
                            @if($project->duration)
                            <li class="flex items-start">
                                <span class="font-bold text-gray-700 w-24">المدة:</span>
                                <span class="text-gray-600 flex-1">{{ $project->duration }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if($project->images && $project->images->count() > 0)
        <h2 class="text-2xl font-bold text-primary mb-6">معرض الصور</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($project->images as $image)
            <div class="rounded-lg overflow-hidden h-64 shadow-sm hover:shadow-md transition">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Project Image" class="w-full h-full object-cover cursor-pointer hover:scale-105 transition-transform duration-300">
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
