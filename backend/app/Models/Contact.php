<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'subjek',
        'alamat',
        'pesan',
        'tanggal_kontak',
        'is_read',
    ];

    protected $casts = [
        'tanggal_kontak' => 'datetime',
    ];
}
