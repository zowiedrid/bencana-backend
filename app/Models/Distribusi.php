<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Posko;
use App\Models\User;

class Distribusi extends Model
{
    use HasFactory;
    protected $table = 'distribusi'; // Nama tabel

    protected $fillable = [
        'tanggal_distribusi',
        'jenis_barang_id', // Kolom untuk ID jenis barang (foreign key)
        'jumlah_didistribusikan',
        'lokasi_distribusi', // Kolom untuk ID posko (foreign key)
        'penerima_bantuan',
        'user_id', // Kolom untuk ID user (foreign key)
        'keterangan', // Kolom untuk keterangan tambahan (opsional)
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class); // Relasi one-to-one dengan tabel Barang
    }

    public function posko()
    {
        return $this->belongsTo(Posko::class); // Relasi one-to-one dengan tabel Posko
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi one-to-one dengan tabel User
    }
}
