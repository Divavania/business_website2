<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubrik extends Model
{
    protected $table = 'rubrik'; 

    protected $fillable = ['nama'];

    public function news()
    {
        return $this->hasMany(News::class, 'rubrik_id');
    }
}
