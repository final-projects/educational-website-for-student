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
        <h1 class="text-xl font-bold">🎓 Student Portal</h1>
        @if (Route::has('login'))
        <nav class="flex gap-4">
          @auth
          <a href="{{ url('/dashboard') }}" class="text-sm px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Dashboard</a>
          @else
          <a href="{{ route('login') }}" class="text-sm px-4 py-2 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Log In</a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="text-sm px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">Register</a>
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
          <h2 class="text-4xl font-extrabold mb-6">Welcome to Your Academic Portal 📘</h2>
          <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
            Save time and stay organized! Our platform offers a complete academic experience to manage your courses, schedule, performance, and communication.
          </p>
          <ul class="space-y-3 text-base">
            <li>📚 <strong>Courses:</strong> Enroll and study with ease.</li>
            <li>🗓️ <strong>Schedule:</strong> Organize your academic day flexibly.</li>
            <li>📢 <strong>Notifications:</strong> Stay updated with important alerts.</li>
            <li>📈 <strong>Analytics:</strong> Track your progress with insightful reports.</li>
            <li>📬 <strong>Support:</strong> Instantly connect with your academic team.</li>
          </ul>
          <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">🔐 Log In</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="px-6 py-3 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">📝 Create Account</a>
            @endif
          </div>
        </div>
        <div>
          <img src="{{ asset('images/student-landing.svg') }}" alt="Student Portal" class="w-full max-w-md mx-auto rounded-lg shadow-lg" />
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-6 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
      <div class="container mx-auto max-w-6xl text-center">
        <h2 class="text-3xl font-bold mb-10">✨ Amazing Features Await</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">📖 Easy Course Enrollment</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Start learning through a user-friendly interface.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">📅 Flexible Schedule Management</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Navigate your calendar and stay on track.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">📊 Detailed Performance Tracking</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Monitor your achievements and access your reports easily.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">✉️ Seamless Communication</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Reach out to instructors and peers anytime.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">🛠️ Custom Settings</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Adjust notifications and themes to your preference.</p>
          </div>
          <div class="p-6 rounded-lg shadow-lg bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold mb-2">🔐 Your Security Matters</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">We keep your data safe with the latest security standards.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Call To Action -->
    <section class="py-20 px-6 bg-blue-600 text-white text-center">
      <div class="container mx-auto max-w-4xl">
        <h2 class="text-3xl font-bold mb-4">Start Your Learning Journey Today! 🚀</h2>
        <p class="text-lg mb-6">Everything you need for academic success in one place.</p>
        <div class="flex justify-center gap-6">
          <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded hover:bg-gray-100 transition">🔐 Log In</a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="px-6 py-3 border border-white font-semibold rounded hover:bg-white hover:text-blue-600 transition">📝 Sign Up</a>
          @endif
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm text-gray-500 dark:text-gray-400">
      Need help? Browse
      <a href="https://laravel.com/docs" target="_blank" class="underline text-blue-600 dark:text-blue-400">📚 Laravel Docs</a>
      or watch
      <a href="https://laracasts.com" target="_blank" class="underline text-blue-600 dark:text-blue-400">📺 Laracasts</a>
    </footer>

  </body>
</html>
