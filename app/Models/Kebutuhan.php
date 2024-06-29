<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Bencana;
use App\Models\User;

class Kebutuhan extends Model
{
    use HasFactory;
    protected $table = 'kebutuhan'; // Nama tabel

    protected $fillable = [
        'jenis_barang_id', // Kolom untuk ID jenis barang (foreign key)
        'jumlah_dibutuhkan',
        'lokasi_kebutuhan',
        'bencana_id', // Kolom untuk ID bencana (foreign key)
        'user_id', // Kolom untuk ID user (foreign key)
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class); // Relasi one-to-one dengan tabel Barang
    }

    public function bencana()
    {
        return $this->belongsTo(Bencana::class); // Relasi one-to-one dengan tabel Bencana
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi one-to-one dengan tabel User
    }
}
