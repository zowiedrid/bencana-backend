<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;
    protected $table = 'bencana'; // Nama tabel

    protected $fillable = [
        'nama_bencana',
        'tanggal_kejadian',
        'waktu_kejadian',
        'lokasi_kejadian',
        'tingkat_keparahan_bencana',
        'jumlah_korban',
        'jumlah_pengungsi',
        'kerugian_materi',
        'deskripsi',
    ];

    public function kebutuhans()
    {
        return $this->hasMany(Kebutuhan::class); // Relasi one-to-many dengan tabel Kebutuhan
    }
}
