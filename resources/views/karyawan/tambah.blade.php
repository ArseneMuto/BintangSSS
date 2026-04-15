@extends('Layouts.main')

@section('content')
<div class="px-8 py-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-slate-800">Tambah Data Karyawan</h2>
        <a href="{{ route('karyawan.index') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    {{-- Menampilkan Error Validasi Secara Global (Opsional) --}}
    @if ($errors->any())
        <div class="mb-5 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-medium">Mohon periksa kembali inputan Anda.</p>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Input Nama --}}
        <div>
            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" 
                   value="{{ old('nama') }}" 
                   placeholder="Masukkan nama karyawan" 
                   class="w-full px-4 py-2 border @error('nama') border-red-500 @else border-slate-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" 
                   required>
            @error('nama')
                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Posisi --}}
        <div>
            <label for="posisi" class="block text-sm font-semibold text-slate-700 mb-2">Posisi / Departemen</label>
            <input type="text" name="posisi" id="posisi" 
                   value="{{ old('posisi') }}" 
                   placeholder="Contoh: IT Support, Accounting, dll." 
                   class="w-full px-4 py-2 border @error('posisi') border-red-500 @else border-slate-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" 
                   required>
            @error('posisi')
                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Jabatan (Dropdown) --}}
        <div>
            <label for="jabatan_id" class="block text-sm font-semibold text-slate-700 mb-2">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" 
                    class="w-full px-4 py-2 border @error('jabatan_id') border-red-500 @else border-slate-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" 
                    required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatans as $j)
                    <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }}
                    </option>
                @endforeach
            </select>
            @error('jabatan_id')
                <p class="mt-1 text-xs text-red-600 font-medium">Harap pilih jabatan yang valid.</p>
            @enderror
        </div>

        {{-- Button Submit --}}
        <div class="pt-4 border-t border-slate-100">
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-200 flex justify-center items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Simpan Data Karyawan
            </button>
        </div>
    </form>
</div>
@endsection