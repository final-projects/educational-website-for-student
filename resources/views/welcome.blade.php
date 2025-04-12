<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Portal</title>
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(["resources/css/app.css", "resources/js/app.js"])
  </head>
  <body class="bg-white text-gray-800 dark:bg-gray-900 dark:text-white">
    <!-- Header -->
    <header class="w-full px-6 py-4 shadow-md bg-white dark:bg-gray-800">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">🎓 بوابة الطالب</h1>
        @if (Route::has('login'))
        <nav class="flex gap-4">
          @auth
          <a href="{{ url('/dashboard') }}" class="text-sm px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">لوحة التحكم</a>
          @else
          <a href="{{ route('login') }}" class="text-sm px-4 py-2 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition">تسجيل الدخول</a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="text-sm px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">إنشاء حساب</a>
          @endif
          @endauth
        </nav>
        @endif
      </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 px-6 bg-gray-50 dark:bg-gray-900">
      <div class="container mx-auto max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-4xl font-extrabold mb-6">مرحبًا بك في بوابتك الأكاديمية 📘</h2>
          <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
            وفر وقتك وجهدك! بوابتنا تقدم لك تجربة تعليمية متكاملة لإدارة الكورسات والجدول الدراسي ومتابعة الأداء والتواصل مع المدرسين.
          </p>
          <ul class="space-y-3 text-base">
            <li>📚 <strong>الكورسات:</strong> اختر وادرس ما يناسبك بكل سهولة.</li>
            <li>🗓️ <strong>جدولك:</strong> نظّم يومك الأكاديمي بمرونة.</li>
            <li>📢 <strong>الإشعارات:</strong> لا تفوّت أي مواعيد أو تنبيهات.</li>
            <li>📈 <strong>تحليلات:</strong> راقب مستواك وتقدمك بدقة.</li>
            <li>📬 <strong>الدعم:</strong> تواصل مع فريقك الأكاديمي فورًا.</li>
          </ul>
          <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">🔐 تسجيل الدخول</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="px-6 py-3 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">📝 إنشاء حساب جديد</a>
            @endif
          </div>
        </div>
        <div>
          <img src="{{ asset('images/student-landing.svg') }}" alt="بوابة الطالب" class="w-full max-w-md mx-auto rounded-lg shadow-lg" />
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-6 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
      <div class="container mx-auto max-w-6xl text-center">
        <h2 class="text-3xl font-bold mb-10">✨ مميزات رائعة تنتظرك</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">📖 تسجيل سهل في الكورسات</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">ابدأ تعلمك مباشرة من خلال واجهة سهلة الاستخدام.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">📅 إدارة مرنة للجدول</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">تصفح جدولك وتابع المحاضرات بانتظام.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">📊 تحليل شامل للأداء</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">تتبع إنجازاتك واطلع على تقاريرك بسهولة.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">✉️ تواصل سلس</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">تحدث مع المدرسين وزملائك في أي وقت.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">🛠️ تخصيص الإعدادات</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">غير إعدادات التنبيهات والثيمات حسب رغبتك.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">🔐 أمانك أولويتنا</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">نحافظ على بياناتك بأحدث تقنيات الأمان.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Call To Action -->
    <section class="py-20 px-6 bg-blue-600 text-white text-center">
      <div class="container mx-auto max-w-4xl">
        <h2 class="text-3xl font-bold mb-4">ابدأ رحلتك التعليمية اليوم! 🚀</h2>
        <p class="text-lg mb-6">كل ما تحتاجه لتحقيق النجاح الأكاديمي في مكان واحد.</p>
        <div class="flex justify-center gap-6">
          <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded hover:bg-gray-100 transition">🔐 تسجيل الدخول</a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="px-6 py-3 border border-white font-semibold rounded hover:bg-white hover:text-blue-600 transition">📝 إنشاء حساب</a>
          @endif
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm text-gray-500 dark:text-gray-400">
      هل تحتاج إلى مساعدة؟ تصفح
      <a href="https://laravel.com/docs" target="_blank" class="underline text-blue-600 dark:text-blue-400">📚 توثيق Laravel</a>
      أو شاهد
      <a href="https://laracasts.com" target="_blank" class="underline text-blue-600 dark:text-blue-400">📺 دروس Laracasts</a>
    </footer>
  </body>
</html>
