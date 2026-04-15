<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    // Paksa gunakan nama tabel dengan 's'
    protected $table = 'karyawans'; 

    protected $fillable = ['nama', 'posisi', 'jabatan_id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}