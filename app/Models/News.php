<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'judul',
        'rubrik_id',
        'konten',
        'gambar',
        'deskripsi_gambar',
        'status',
    ];

    public $timestamps = true; // aktifkan created_at dan updated_at

    public function rubrik()
    {
        return $this->belongsTo(Rubrik::class, 'rubrik_id');
    }
}
