<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan default plural (contacts)
    protected $table = 'contacts';

    // Tentukan kolom mana yang dapat diisi secara massal (mass-assignment)
    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'subjek',
        'alamat',
        'pesan',
        'tanggal_kontak',
        'is_read',  // Kolom baru
    ];

    // Tentukan kolom yang harus di-cast ke tipe tertentu, seperti datetime
    protected $casts = [
        'tanggal_kontak' => 'datetime',
    ];
}
