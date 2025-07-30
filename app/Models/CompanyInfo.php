<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $table = 'company_info';

    protected $fillable = [
        'company_name',
        'tagline',
        'street',
        'city',
        'province',
        'postal_code',
        'country',
        'phone_number',
        'whatsapp_number',
        'contact_email',
        'facebook_link',  
        'tiktok_link',    
        'youtube_link',   
        'instagram_link',
        'linkedin_link',
        'google_maps_embed_link',
    ];

    public $timestamps = false;
}
