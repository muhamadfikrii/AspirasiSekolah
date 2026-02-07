<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard Aspirasi Siswa</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-6 py-3">Nama Siswa</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Aspirasi</th>
                        <th class="px-6 py-3">Foto</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                        <th class="px-6 py-3">Feedback</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($aspirations as $aspiration)
                        <tr>
                            <td class="px-6 py-4 font-medium">
                                {{ $aspiration->students->user->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $aspiration->category->category_name }}
                            </td>

                            <td class="px-6 py-4 max-w-md truncate">
                                {{ $aspiration->description }}
                            </td>

                            <td class="px-6 py-4 max-w-md truncate">
                                @if ($aspiration->image)
                                    <img class="w-14 h-16" src="{{ asset('storage/' . $aspiration->image) }}" alt="">
                                @else
                                    <p class="text-gray-500">Foto tidak ada</p>
                                @endif

                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($aspiration->status->value === 'menunggu') bg-yellow-100 text-yellow-700
                                    @elseif($aspiration->status->value === 'proses') bg-blue-100 text-blue-700
                                    @else bg-green-100 text-green-700
                                    @endif">
                                    {{ $aspiration->status->label() }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <form action="{{ route('dashboard.update', $aspiration->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                        class="border rounded px-2 py-1 text-sm"
                                        onchange="this.form.submit()">
                                        <option value="menunggu" @selected($aspiration->status->value === 'menunggu')>
                                            Menunggu
                                        </option>
                                        <option value="proses" @selected($aspiration->status->value === 'proses')>
                                            Proses
                                        </option>
                                        <option value="selesai" @selected($aspiration->status->value === 'selesai')>
                                            Selesai
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td class="px-6 text-center py-4">
                                <a href="{{ route('dashboard.feedback.create', $aspiration->id) }}"
                                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded inline-block">
                                    Berikan Feedback
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                Belum ada aspirasi masuk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
