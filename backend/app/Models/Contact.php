<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    // KOREKSI: Memberi tahu Laravel untuk tidak menggunakan timestamps
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'subjek',
        // 'alamat', // Kolom ini tidak ada di form atau controller, jadi saya sarankan untuk tidak memasukkannya di fillable jika tidak digunakan.
        'pesan',
        'tanggal_kontak',
        'is_read',
    ];

    protected $casts = [
        'tanggal_kontak' => 'datetime',
    ];
}