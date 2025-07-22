<div class="bg-[#d0eaeb] rounded-2xl shadow-md border-[1.5px] border-[#96d3da] p-6">
    @if (!empty($dataAbsensi))
        <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl overflow-hidden">
            <thead>
                <tr class="bg-[#96d3da] text-[#0067ac]">
                    <th class="py-3 px-4 text-left rounded-tl-xl">Nama</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left rounded-tr-xl">Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $data)
                    <tr class="border-b last:border-b-0">
                        <td class="py-2 px-4">{{ $data['nama'] }}</td>
                        <td class="py-2 px-4">{{ $data['tanggal'] }}</td>
                        <td class="py-2 px-4">
                            @if (strtolower($data['status']) === 'hadir')
                                <span class="text-[#38a169] font-semibold">{{ $data['status'] }}</span>
                            @else
                                <span class="text-[#e53e3e] font-semibold">{{ $data['status'] }}</span>
                            @endif
                        </td>
                        <td class="py-2 px-4">
                            @if (!empty($data['foto']))
                                <img src="{{ asset($data['foto']) }}" class="w-16 h-16 object-cover rounded-md border border-[#96d3da]" alt="photo">
                                {{-- asset() otomatis mencari di public/img/Absensi/xxx --}}
                            @else
                                <span class="text-[#96d3da]">No photo</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @else
        <p class="text-[#0067ac] text-lg py-4">No attendance records yet.</p>
    @endif
</div>