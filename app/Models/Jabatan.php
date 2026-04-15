<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';

    protected $fillable = ['nama_jabatan', 'gaji_pokok'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}