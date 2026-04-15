@extends('Layouts.main')

@section('content')
<div class="px-8 py-6">
    <h2 class="text-2xl font-semibold mb-4 text-slate-800">Data Karyawan & Jabatan</h2>

    <div class="flex flex-wrap justify-between items-center mb-6 gap-4">
        <form action="{{ route('karyawan.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama atau jabatan..." 
                   class="px-4 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Cari
            </button>
        </form>
        
        <a href="{{ route('karyawan.tambah') }}" class="bg-emerald-600 text-white px-5 py-2 rounded-md hover:bg-emerald-700 transition duration-200 shadow-sm">
            + Tambah Karyawan
        </a>
    </div>

    <div class="overflow-hidden bg-white rounded-xl shadow-md border border-slate-200">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="px-6 py-4 font-semibold text-slate-700 uppercase text-xs tracking-wider">Nama</th>
                    <th class="px-6 py-4 font-semibold text-slate-700 uppercase text-xs tracking-wider">Posisi</th>
                    <th class="px-6 py-4 font-semibold text-slate-700 uppercase text-xs tracking-wider">Jabatan</th>
                    <th class="px-6 py-4 font-semibold text-slate-700 uppercase text-xs tracking-wider">Gaji Pokok</th>
                    <th class="px-6 py-4 font-semibold text-slate-700 uppercase text-xs tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($karyawans as $k)
                <tr class="hover:bg-slate-50 transition duration-150">
                    <td class="px-6 py-4 text-slate-800 font-medium">{{ $k->nama }}</td>
                    <td class="px-6 py-4 text-slate-600">{{ $k->posisi }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-50 text-blue-700 text-xs font-bold px-3 py-1 rounded-full border border-blue-100">
                            {{ $k->jabatan->nama_jabatan ?? 'Belum Diatur' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-slate-600 font-mono">
                        Rp{{ number_format($k->jabatan->gaji_pokok ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-3">
                            <a href="{{ route('karyawan.edit', ['id' => $k->id]) }}" class="text-amber-600 hover:text-amber-700 font-medium flex items-center gap-1">
                                <span>Edit</span>
                            </a>
                            
                            <form action="{{ route('karyawan.delete', ['id' => $k->id ])}}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-slate-500 italic">
                        Data tidak ditemukan...
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $karyawans->appends(['search' => $search ?? ''])->links() }}
    </div>
</div>
@endsection