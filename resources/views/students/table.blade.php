<div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden my-10 mx-5">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Aspirasi</h2>
        <p class="text-gray-600 text-sm mt-1">Data aspirasi yang telah diajukan</p>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Lokasi
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Status
                    </th>
                </tr>`
            </thead>
            
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($aspirations as $aspiration)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $aspiration->students->user->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-700">
                                {{ $aspiration->students->class }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $aspiration->location }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-700 max-w-md">
                                {{ $aspiration->description }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($aspiration->status === \App\Enums\AspirationStatus::MENUNGGU)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                            bg-yellow-100 text-yellow-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Menunggu
                                </span>
                                <p class="text-xs text-gray-500 mt-1">
                                    Pengaduan kamu sudah diterima dan menunggu diproses
                                </p>

                            @elseif ($aspiration->status === \App\Enums\AspirationStatus::PROSES)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                            bg-blue-100 text-blue-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Proses
                                </span>
                                <p class="text-xs text-gray-500 mt-1">
                                    Pengaduan kamu sedang ditangani
                                </p>

                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                            bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Selesai
                                </span>
                                <p class="text-xs text-gray-500 mt-1">
                                    Pengaduan kamu sudah selesai ditangani dan akan segera ditindaklanjuti
                                </p>
                            @endif
                        </td>
                            <td class="text-center pr-5">
                                <a href="{{ route('student.show', $aspiration->id) }}" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-5 h-5 fill-blue-500">
                                    <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 96c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm48 304h-96c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16V240h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16v112h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($aspirations->count() === 0)
        <div class="text-center py-12">
            <div class="text-gray-400 mb-2">
                <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <p class="text-gray-500">Belum ada data aspirasi</p>
        </div>
    @endif
    
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-600">
                Total: <span class="font-medium">{{ $aspirations->count() }}</span> data
            </div>
            <div class="text-xs text-gray-500">
                Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
            </div>
        </div>
    </div>
</div>