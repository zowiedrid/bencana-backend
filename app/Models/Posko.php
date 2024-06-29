<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posko extends Model
{
    use HasFactory;
    protected $table = 'posko'; // Nama tabel

    protected $fillable = [
        'nama_posko',
        'alamat',
        'kontak_penanggung_jawab',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class); // Relasi one-to-one dengan tabel Daerah
    }

    public function distribusis()
    {
        return $this->hasMany(Distribusi::class); // Relasi one-to-many dengan tabel Distribusi
    }
}
