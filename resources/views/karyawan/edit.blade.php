@extends('Layouts.main')

@section('content')
    <div class="px-3 py-4">
        <h2 class="text-2xl font-semibold text-slate-800">Edit Data Karyawan</h2>
    </div>
    
    <div class="px-3 pb-3">
        {{-- FIX DI SINI --}}
        <a href="{{ route('karyawan.index') }}" class="text-lg text-blue-600 font-base">Kembali</a>
    </div>

    <form action="{{ route('karyawan.update', ['id' => $karyawan->id ])}}" method="POST" class="mx-auto p-6 space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label for="nama" class="block text-sm font-medium text-slate-700 mb-2">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border border-blue-300 rounded-md" required value="{{ $karyawan->nama }}">
        </div>

        <div>
            <label for="posisi" class="block text-sm font-medium text-slate-700 mb-2">Posisi</label>
            <input type="text" name="posisi" id="posisi" class="w-full px-4 py-2 border border-blue-300 rounded-md" required value="{{ $karyawan->posisi }}">
        </div>

        {{-- TAMBAHKAN JABATAN AGAR UPDATE TIDAK GAGAL VALIDASI --}}
        <div>
            <label for="jabatan_id" class="block text-sm font-medium text-slate-700 mb-2">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="w-full px-4 py-2 border border-blue-300 rounded-md" required>
                @foreach($jabatans as $j)
                    <option value="{{ $j->id }}" {{ $karyawan->jabatan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
            Simpan Perubahan
        </button>
    </form>
@endsection