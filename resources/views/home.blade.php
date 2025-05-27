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
    /* Tambah smooth transition untuk input dan button */
    input, button {
      transition: all 0.3s ease;
    }
  </style>
</head>
<body class="h-full flex items-center justify-center">

  <div
    class="bg-gray-900 bg-opacity-90 backdrop-blur-lg rounded-2xl shadow-2xl p-12 max-w-4xl w-full text-white flex flex-col md:flex-row items-center gap-12"
  >
    <div class="hidden md:block flex-1">
      <img
        src="https://cdn-icons-png.flaticon.com/512/2331/2331941.png"
        alt="Quran Icon"
        class="w-72 mx-auto float-animation drop-shadow-lg"
      />
    </div>

    <div class="flex-1 max-w-md">
      <h2
        class="text-5xl font-extrabold mb-10 text-red-500 text-center md:text-left drop-shadow-xl tracking-wide"
      >
        Login Hafalan Tracker
      </h2>

      <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <div>
          <label for="email" class="block mb-3 font-semibold text-gray-300 uppercase tracking-wide"
            >Email Address</label
          >
          <div class="relative text-gray-400 focus-within:text-red-500">
            <input
              id="email"
              name="email"
              type="email"
              value="{{ old('email') }}"
              required
              autofocus
              placeholder="you@example.com"
              class="w-full rounded-lg bg-gray-800 border border-gray-700 px-5 py-4 pr-12 text-white placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-red-600 focus:border-red-600 shadow-sm"
            />
            <i class="fa-solid fa-envelope absolute right-4 top-4 text-red-500"></i>
          </div>
          @error('email')
          <p class="text-red-400 text-sm mt-2 italic">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password" class="block mb-3 font-semibold text-gray-300 uppercase tracking-wide"
            >Password</label
          >
          <div class="relative text-gray-400 focus-within:text-red-500">
            <input
              id="password"
              name="password"
              type="password"
              required
              placeholder="********"
              class="w-full rounded-lg bg-gray-800 border border-gray-700 px-5 py-4 pr-12 text-white placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-red-600 focus:border-red-600 shadow-sm"
            />
            <i class="fa-solid fa-lock absolute right-4 top-4 text-red-500"></i>
          </div>
          @error('password')
          <p class="text-red-400 text-sm mt-2 italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex items-center justify-between">
          <label class="inline-flex items-center text-gray-300 select-none">
            <input
              type="checkbox"
              name="remember"
              id="remember"
              class="rounded border-gray-600 text-red-500 focus:ring-red-400"
              {{ old('remember') ? 'checked' : '' }}
            />
            <span class="ml-2 font-medium">Remember me</span>
          </label>

          @if (Route::has('password.request'))
          <a
            href="{{ route('password.request') }}"
            class="text-red-400 hover:text-red-300 text-sm font-semibold transition"
            >Forgot password?</a
          >
          @endif
        </div>

        <button
          type="submit"
          class="w-full py-4 bg-red-600 hover:bg-red-700 rounded-xl font-extrabold text-xl tracking-wide drop-shadow-lg shadow-red-500/60"
        >
          Login
        </button>
      </form>
    </div>
  </div>
</body>
</html>
