<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;
    protected $table = 'daerah'; // Nama tabel

    protected $fillable = [
        'id_daerah',
        'nama_kabupaten',
        'nama_kecamatan',
        'nama_kelurahan',
        'nama_desa',
        'koordinat',
    ];

    public function poskos()
    {
        return $this->hasMany(Posko::class); // Relasi one-to-many dengan tabel Posko
    }

    public function kebutuhans()
    {
        return $this->hasMany(Kebutuhan::class); // Relasi one-to-many dengan tabel Kebutuhan
    }
}
