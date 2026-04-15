<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // READ dengan Fitur Search, Join, dan Pagination
    public function index(Request $request)
    {
        // 1. Ambil input search dari user
        $search = $request->query('search');

        // 2. Query Eloquent: Join dengan Jabatan + Search + Pagination
        $karyawans = Karyawan::with('jabatan')
            ->where(function($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%")
                      ->orWhere('posisi', 'LIKE', "%{$search}%")
                      ->orWhereHas('jabatan', function($q) use ($search) {
                          $q->where('nama_jabatan', 'LIKE', "%{$search}%");
                      });
            })
            ->paginate(5); // Poin tugas: Pagination (5 data per halaman)

        // 3. Kirim data ke view
        return view('karyawan.index', compact('karyawans', 'search'));
    }

    // Menampilkan Form Tambah
    public function create()
{
    $jabatans = Jabatan::all();
    return view('karyawan.tambah', compact('jabatans'));
}

public function store(Request $request)
{
    // 1. Validasi
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'posisi' => 'required|string|max:255',
        'jabatan_id' => 'required|exists:jabatans,id'
    ]);

    // 2. Simpan
    Karyawan::create($validatedData);

    // 3. Redirect ke route name
    return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan!');
}

    // Menampilkan Form Edit
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $jabatans = Jabatan::all(); // Agar bisa ganti jabatan saat edit

        return view('karyawan.edit', compact('karyawan', 'jabatans'));
    }

    // Update Data (UPDATE)
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'jabatan_id' => 'required|exists:jabatans,id'
        ]);
        
        $karyawan->update([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'jabatan_id' => $request->jabatan_id
        ]);

        return redirect('/karyawan')->with('success', 'Data berhasil diperbarui!');
    }

    // Hapus Data (DELETE)
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan')->with('success', 'Data berhasil dihapus!');
    }
}