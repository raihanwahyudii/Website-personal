<!DOCTYPE html>
<html lang="en" class="h-full bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Hafalan Tracker 99</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    @keyframes floatUpDown {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }
    .float-animation {
      animation: floatUpDown 4s ease-in-out infinite;
    }
  </style>
</head>
<body class="h-full flex items-center justify-center">

  <main class="bg-gray-900 bg-opacity-80 backdrop-blur-md rounded-xl shadow-xl p-10 max-w-4xl w-full text-white flex flex-col md:flex-row items-center gap-12">

    <!-- Left Image -->
    <section class="hidden md:flex flex-1 justify-center">
      <img
        src="https://cdn-icons-png.flaticon.com/512/2331/2331941.png"
        alt="Quran Icon"
        class="w-64 float-animation drop-shadow-lg"
        loading="lazy"
      />
    </section>

    <!-- Form Section -->
    <section class="flex-1 max-w-md w-full">
      <h1 class="text-4xl font-extrabold mb-8 text-red-500 text-center md:text-left drop-shadow-lg">
        Login Hafalan Tracker
      </h1>

      <form method="POST" action="{{ route('login') }}" class="space-y-6" novalidate>
        @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block mb-2 font-semibold text-gray-300">Email Address</label>
          <div class="relative">
            <input
              id="email"
              name="email"
              type="email"
              value="{{ old('email') }}"
              required
              autofocus
              placeholder="you@example.com"
              class="w-full rounded-md bg-gray-800 border border-gray-700 px-4 py-3 pr-10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 transition"
              aria-describedby="email-error"
            />
            <i class="fa-solid fa-envelope absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
          </div>
          @error('email')
            <p id="email-error" class="text-red-400 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block mb-2 font-semibold text-gray-300">Password</label>
          <div class="relative">
            <input
              id="password"
              name="password"
              type="password"
              required
              placeholder="********"
              class="w-full rounded-md bg-gray-800 border border-gray-700 px-4 py-3 pr-10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 transition"
              aria-describedby="password-error"
            />
            <i class="fa-solid fa-lock absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
          </div>
          @error('password')
            <p id="password-error" class="text-red-400 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between text-gray-300 text-sm">
          <label class="inline-flex items-center cursor-pointer select-none">
            <input
              type="checkbox"
              name="remember"
              id="remember"
              class="rounded border-gray-600 text-red-500 focus:ring-red-400"
              {{ old('remember') ? 'checked' : '' }}
            />
            <span class="ml-2">Remember me</span>
          </label>

          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="hover:text-red-400 font-semibold">
              Forgot password?
            </a>
          @endif
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full py-3 bg-red-600 hover:bg-red-700 rounded-md font-extrabold text-lg transition duration-300 shadow-lg shadow-red-500/50"
        >
          Login
        </button>
      </form>
    </section>

  </main>

</body>
</html>
