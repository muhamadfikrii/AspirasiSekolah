<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berikan Feedback</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Berikan Feedback untuk Aspirasi</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Detail Aspirasi</h2>
                <p><strong>Nama Siswa:</strong> {{ $aspiration->students->user->name }}</p>
                <p><strong>Judul:</strong> {{ $aspiration->category->category_name }}</p>
                <p><strong>Aspirasi:</strong> {{ $aspiration->description }}</p>
                <p><strong>Status:</strong> {{ $aspiration->status->label() }}</p>
            </div>

            <form action="{{ route('dashboard.feedback.store') }}" method="POST">
                @csrf
                <input type="hidden" name="aspiration_id" value="{{ $aspiration->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Isi Feedback:</label>
                    <textarea name="content" id="content" rows="6" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Tulis feedback di sini..." required></textarea>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('dashboard.index') }}" class="mr-4 px-4 py-2 bg-gray-300 text-gray-900 rounded-md">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Kirim Feedback</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
