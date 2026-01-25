<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Login
        </h1>

        <form action="{{ route('login') }}" x-data="{open: false}" method="POST" class="space-y-5">
            @csrf
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div x-data="{ open: false }">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>

                <!-- INPUT WRAPPER -->
                <div class="relative">
                    <input
                        :type="open ? 'text' : 'password'"
                        name="password"
                        placeholder="••••••••"
                        class="w-full rounded-lg border border-gray-300 px-4 pr-10 py-2
                            focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <button
                        type="button"
                        @click="open = !open"
                        class="absolute inset-y-0 right-0 flex items-center pr-3
                            text-gray-500 hover:text-gray-700">
                        <!-- Eye Open -->
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round"
                            class="w-5 h-5">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>

                        <!-- Eye Closed -->
                        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round"
                            class="w-5 h-5">
                            <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-5.94"/>
                            <path d="M1 1l22 22"/>
                        </svg>
                    </button>
                </div>

                @error('password')
                    <p class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Remember me & Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Ingat saya
                </label>
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Masuk
            </button>
        </form>

        <!-- Register -->
        <p class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                Daftar
            </a>
        </p>
    </div>

</body>
</html>
