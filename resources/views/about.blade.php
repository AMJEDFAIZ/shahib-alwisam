@extends('layouts.site')
@section('title', ' من نحن')

@section('meta_description', $settings['site_description'] ?? null)
@section('meta_keywords', collect([
    $settings['site_name'] ?? null,
    'من نحن','مؤسسة صاحب الوسام','خدماتنا','مشاريعنا'
])->filter()->implode(', '))



@section('content')
    <!-- Header -->
    <div class="bg-gray-100 py-12 border-b">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-primary">من نحن</h1>
            <nav class="text-sm mt-2 text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary">الرئيسية</a> / <span>من نحن</span>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-12">
                <div class="md:w-1/2">
                    <img src="{{ asset('logo-wisam.PNG') }}" class="w-full rounded shadow-lg bg-gray-50 p-4" alt="About Us">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-2xl font-bold text-primary mb-4">قصتنا</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        مؤسسة صاحب الوسام هي كيان وطني رائد في مجال المقاولات والإنشاءات. منذ تأسيسنا، ونحن نعمل بجد لتحقيق رؤية المملكة 2030 من خلال المشاركة الفعالة في النهضة العمرانية.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        نفتخر بفريقنا المكون من مهندسين وفنيين ذوي خبرة عالية، ومعداتنا الحديثة التي تمكننا من تنفيذ أصعب المشاريع بكفاءة واقتدار.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-gray-50 p-6 rounded border-r-4 border-secondary">
                            <h3 class="text-xl font-bold text-primary mb-2">رؤيتنا</h3>
                            <p class="text-sm text-gray-600">أن نكون الخيار الأول في قطاع المقاولات بالمملكة، ونموذجاً يحتذى به في الجودة والابتكار.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded border-r-4 border-secondary">
                            <h3 class="text-xl font-bold text-primary mb-2">رسالتنا</h3>
                            <p class="text-sm text-gray-600">تقديم خدمات إنشائية متميزة تفوق توقعات العملاء، مع الالتزام بأعلى معايير السلامة والاستدامة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-primary mb-12">مهاراتنا</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($skills as $skill)
                <div class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-gray-700">{{ $skill->name }}</span>
                        <span class="text-secondary font-bold">{{ $skill->percentage }}%</span>
                    </div>
                    <div style="width: 100%; background-color: #e5e7eb; border-radius: 9999px; height: 10px; overflow: hidden;">
                      <div style="width: {{ trim($skill->percentage) }}%; background-color: #2563eb; height: 10px; border-radius: 9999px; display: block !important;"></div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-primary mb-12">قيمنا</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white p-6 rounded shadow-sm">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4 text-primary font-bold text-2xl">1</div>
                    <h3 class="font-bold mb-2">الجودة</h3>
                    <p class="text-sm text-gray-500">لا نتنازل عن الجودة في أي تفصيل من تفاصيل العمل.</p>
                </div>
                <div class="bg-white p-6 rounded shadow-sm">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4 text-primary font-bold text-2xl">2</div>
                    <h3 class="font-bold mb-2">النزاهة</h3>
                    <p class="text-sm text-gray-500">الشفافية والصدق هما أساس تعاملنا مع الجميع.</p>
                </div>
                <div class="bg-white p-6 rounded shadow-sm">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4 text-primary font-bold text-2xl">3</div>
                    <h3 class="font-bold mb-2">الالتزام</h3>
                    <p class="text-sm text-gray-500">نحترم المواعيد والعهود التي نقطعها لعملائنا.</p>
                </div>
                <div class="bg-white p-6 rounded shadow-sm">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4 text-primary font-bold text-2xl">4</div>
                    <h3 class="font-bold mb-2">الابتكار</h3>
                    <p class="text-sm text-gray-500">نبحث دائمًا عن حلول جديدة وفعالة.</p>
                </div>
            </div>
        </div>
    </section>
@endsection