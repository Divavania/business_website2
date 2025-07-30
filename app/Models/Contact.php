<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact_messages';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company_name',
        'address',
        'city',
        'phone_number',
        'message',
        'is_read', 
    ];
    protected $casts = [
        'is_read' => 'boolean',
    ];
}