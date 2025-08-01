<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'alt_text',
        'vendor_category_id'
    ];

    // Relasi ke VendorCategory
    public function category()
    {
        return $this->belongsTo(VendorCategory::class, 'vendor_category_id');
    }
}