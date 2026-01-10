@extends('layouts.site')

@section('title', ' تواصل معنا')
@section('meta_title', $settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام'))
@section('meta_description', $settings['site_description'] ?? null)
@section('meta_keywords', collect([
    $settings['site_name'] ?? null,
    'تواصل معنا','تواصل','الاتصال'
])->filter()->implode(', '))

@section('content')
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
             <x-section-header title="تواصل معنا" subtitle="نحن هنا للإجابة على استفساراتكم ومناقشة مشاريعكم" />
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div data-aos="fade-left">
                <h3 class="text-2xl font-bold text-primary mb-6">معلومات الاتصال</h3>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">العنوان</h4>
                            <p class="text-gray-600">{{ $settings['address'] ?? 'المملكة العربية السعودية' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">الهاتف</h4>
                            <p class="text-gray-600" dir="ltr">{{ $settings['phone'] ?? '+966 50 123 4567' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">البريد الإلكتروني</h4>
                            <p class="text-gray-600">{{ $settings['email'] ?? 'info@example.com' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary ml-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">ساعات العمل</h4>
                            <p class="text-gray-600">{{ $settings['working_hours'] ?? 'الأحد - الخميس: 8:00 ص - 5:00 م' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Map Placeholder -->
                <div class="mt-8 bg-gray-200 rounded-lg h-64 w-full flex items-center justify-center text-gray-500 overflow-hidden shadow-md">
                    <iframe src="" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-primary mb-6">أرسل لنا رسالة</h3>
                <div id="contact-alert" class="hidden mb-4 p-4 rounded text-sm"></div>
                <form id="contact-form">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block text-gray-700 font-bold mb-2">الاسم الكامل</label>
                            <input type="text" id="name" name="name" maxlength="100" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-secondary" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-bold mb-2">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-secondary">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-secondary" required>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700 font-bold mb-2">الموضوع</label>
                        <select id="subject" name="subject" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-secondary" required>
                            <option value="">اختر الموضوع</option>
                            <option value="استشارة">استشارة</option>
                            <option value="عرض سعر">عرض سعر</option>
                            <option value="دعم">دعم</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-bold mb-2">الرسالة</label>
                        <textarea id="message" name="message" rows="5" maxlength="500" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-secondary" required></textarea>
                        <div class="text-xs text-gray-500 mt-1"><span id="char-count">0</span>/500</div>
                    </div>
                    <button id="submit-btn" type="submit" class="w-full bg-secondary text-primary font-bold py-3 px-4 rounded-md hover:bg-primary hover:text-white transition duration-300">إرسال</button>
                </form>
                <script>
                    const form = document.getElementById('contact-form');
                    const submitBtn = document.getElementById('submit-btn');
                    const alertBox = document.getElementById('contact-alert');
                    const emailInput = document.getElementById('email');
                    const nameInput = document.getElementById('name');
                    const subjectSelect = document.getElementById('subject');
                    const messageInput = document.getElementById('message');
                    const charCount = document.getElementById('char-count');
                    function showAlert(text, type) {
                        alertBox.textContent = text;
                        alertBox.className = 'mb-4 p-4 rounded text-sm ' + (type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700');
                        alertBox.classList.remove('hidden');
                    }
                    function hideAlert() {
                        alertBox.classList.add('hidden');
                    }
                    function validEmail(v) {
                        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
                    }
                    messageInput.addEventListener('input', function() {
                        charCount.textContent = this.value.length;
                    });
                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        hideAlert();
                        const name = nameInput.value.trim();
                        const email = emailInput.value.trim();
                        const subject = subjectSelect.value.trim();
                        const message = messageInput.value.trim();
                        if (!name || !email || !subject || !message) {
                            showAlert('يرجى ملء جميع الحقول المطلوبة', 'error');
                            return;
                        }
                        if (!validEmail(email)) {
                            showAlert('صيغة البريد الإلكتروني غير صحيحة', 'error');
                            return;
                        }
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'جاري الإرسال...';
                        try {
                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            const res = await fetch('{{ route('contact.submit') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({ name, email, subject, message, phone: document.getElementById('phone').value })
                            });
                            const data = await res.json();
                            if (res.ok && data.status === 'ok') {
                                showAlert('تم إرسال رسالتك بنجاح', 'success');
                                form.reset();
                                charCount.textContent = '0';
                            } else {
                                showAlert('تعذر إرسال الرسالة، حاول لاحقاً', 'error');
                            }
                        } catch (err) {
                            showAlert('حدث خطأ غير متوقع', 'error');
                            console.error(err);
                        } finally {
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'إرسال';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
