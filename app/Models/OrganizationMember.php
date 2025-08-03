<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    use HasFactory;

    protected $table = 'organization_members';

    protected $fillable = [
        'photo',
        'name',
        'position',
        'description',
        'order',
    ];
}