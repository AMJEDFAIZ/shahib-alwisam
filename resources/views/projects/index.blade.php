@extends('layouts.site')
@section('title', ' مشاريعنا')
@section('meta_title', $settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام'))
@section('meta_description', $settings['site_description'] ?? null)
@section('meta_keywords', collect([
    $settings['site_name'] ?? null,
    'مشاريعنا','مشاريع','المشاريع'
])->filter()->implode(', '))



@section('content')
<div class="bg-gray-100 py-12 border-b">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-primary">مشاريعنا</h1>
        <nav class="text-sm mt-2 text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">الرئيسية</a> / <span>المشاريع</span>
        </nav>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
        @if(session('error'))
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">{{ session('error') }}</div>
        @endif
        @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="group relative overflow-hidden rounded-lg shadow-md h-80">
                @if($project->main_image)
                    <img src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">لا توجد صورة</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h3 class="text-white text-xl font-bold mb-1">{{ $project->title }}</h3>
                    <p class="text-gray-200 text-sm mb-3">{{ $project->location ?? '' }}</p>
                    <a href="{{ route('projects.show', $project->slug) }}" class="inline-block bg-secondary text-primary text-sm font-bold px-4 py-2 rounded hover:bg-white transition w-fit">تفاصيل المشروع</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $projects->links() }}
        </div>
        @else
        <div class="text-center text-gray-500 py-8">
            <p>لا توجد مشاريع متاحة حالياً.</p>
        </div>
        @endif
    </div>
</section>
@endsection
