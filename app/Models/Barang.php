<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kebutuhan; // Import Kebutuhan Model
use App\Models\Distribusi; // Import Distribusi Model
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Nama tabel

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'satuan',
        'gambar', // Kolom untuk gambar (opsional)
        'keterangan',
    ];

    public function kebutuhans()
    {
        return $this->hasMany(Kebutuhan::class); // Many-to-Many relationship with Need model (items needed)
    }

    public function distribusis()
    {
        return $this->hasMany(Distribusi::class); // Many-to-Many relationship with Distribution model (items distributed)
    }
}
