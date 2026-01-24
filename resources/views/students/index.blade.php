<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan Sarana Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.4/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="shrink-0 flex items-center">
                        <div class="h-8 w-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <span class="ml-2 text-xl font-bold text-gray-800">Pengaduan Sarana <span class="text-blue-600">Sekolah</span></span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button onclick="window.location.href='{{ route('logout') }}'"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Keluar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Sistem Pengaduan Sarana Sekolah</h1>
                    <p class="mt-2 text-gray-600">Laporkan kerusakan atau masalah pada fasilitas sekolah Anda</p>
                </div>
                <div class="bg-blue-50 px-4 py-2 rounded-lg border border-blue-100">
                    <p class="text-sm text-blue-700">
                        <span class="font-medium">Status:</span>
                        <span class="text-green-600 font-medium">Buka</span> untuk pengaduan
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-tr from-blue-50 to-white">
                        <h2 class="text-xl font-semibold text-gray-800">Formulir Pengaduan Baru</h2>
                        <p class="text-gray-600 text-sm mt-1">Isi formulir di bawah ini dengan lengkap dan benar</p>
                    </div>

                    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                        @csrf

                        <!-- Grid untuk Nama, NIS, Kelas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Nama Siswa --}}
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Nama Lengkap Siswa
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name"
                                    value="{{ old('name') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- NIS --}}
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    NIS (Nomor Induk Siswa)
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nis"
                                    value="{{ old('nis') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Contoh: 1234567890">
                                @error('nis')
                                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Kelas --}}
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Kelas
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="class"
                                    value="{{ old('class') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Contoh: XI PPLG 1">
                                @error('class')
                                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Kategori Sarana --}}
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Kategori Sarana
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="category_id"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 appearance-none bg-white">
                                <option value="">-- Pilih Kategori Sarana --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        class="py-2">
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Lokasi --}}
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Lokasi Detail
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="location"
                                value="{{ old('location') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Contoh: Ruang Kelas XI RPL 1, Lantai 2, Gedung A">
                            @error('location')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        {{ $message }}
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Deskripsi Pengaduan
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" rows="5"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none"
                                    placeholder="Jelaskan secara detail tentang kerusakan atau masalah yang ditemukan, termasuk kondisi saat ini dan kapan pertama kali ditemukan...">{{ old('description') }}</textarea>
                            <div class="flex justify-between items-center text-xs text-gray-500">
                                <span>Jelaskan dengan jelas untuk proses penanganan yang lebih cepat</span>
                            </div>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Bukti Foto (Opsional)
                            </label>
                            <label for="File" class="flex relative flex-col items-center rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Unggah foto bukti kerusakan</p>
                                    <p class="text-xs text-gray-500">Format: JPG, PNG (Maks. 5MB)</p>
                                </div>

                                <span class="mt-4 font-medium"> Upload your file(s) </span>

                                <span class="mt-2 inline-block rounded border border-gray-200 bg-gray-50 px-3 py-1.5 text-center text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-100">
                                    Browse files
                                </span>

                                <input name="image" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                            </label>
                            @error('image')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-6 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-gray-500">
                                    <span class="text-red-500">*</span> Wajib diisi
                                </div>
                                <button type="submit"
                                        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 transition-all duration-200 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    Kirim Pengaduan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Information Sidebar -->
            <div class="lg:col-span-1">
                <div class="space-y-6">
                    <!-- Info Card -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Panduan Pengisian
                        </h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <div class="shrink-0 w-6 h-6 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs font-medium">
                                    1
                                </div>
                                <span class="text-sm text-gray-600">Isi data pribadi dengan lengkap dan benar</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="shrink-0 w-6 h-6 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs font-medium">
                                    2
                                </div>
                                <span class="text-sm text-gray-600">Pilih kategori yang sesuai dengan jenis kerusakan</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="shrink-0 w-6 h-6 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs font-medium">
                                    3
                                </div>
                                <span class="text-sm text-gray-600">Sebutkan lokasi secara detail untuk memudahkan penanganan</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="shrink-0 w-6 h-6 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs font-medium">
                                    4
                                </div>
                                <span class="text-sm text-gray-600">Lampirkan foto bukti untuk mempercepat proses verifikasi</span>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>

        <!-- Tabel Pengaduan -->
        <div class="mt-10">
            @include('students.table')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Sistem Pengaduan Sarana Sekolah. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
