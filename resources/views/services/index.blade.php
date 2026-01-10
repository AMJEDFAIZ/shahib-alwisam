@extends('layouts.site')

@section('title', ' خدماتنا')
@section('meta_title', $settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام'))
@section('meta_description', $settings['site_description'] ?? null)
@section('meta_keywords', collect([
    $settings['site_name'] ?? null,
    'خدماتنا','خدمات','الخدمات'
])->filter()->implode(', '))

@section('content')
<div class="bg-gray-100 py-12 border-b">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-primary">خدماتنا</h1>
        <nav class="text-sm mt-2 text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">الرئيسية</a> / <span>الخدمات</span>
        </nav>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
        @if(session('error'))
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">{{ session('error') }}</div>
        @endif
        @if($services->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition group">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition overflow-hidden">
                    @if($service->image_path)
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-primary mb-3">{{ $service->title }}</h3>
                <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 100) }}</p>
                <a href="{{ route('services.show', $service->slug) }}" class="text-secondary font-bold hover:text-primary transition text-sm">اقرأ المزيد &larr;</a>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $services->links() }}
        </div>
        @else
        <div class="text-center text-gray-500 py-8">
            <p>لا توجد خدمات متاحة حالياً.</p>
        </div>
        @endif
    </div>
</section>
@endsection
