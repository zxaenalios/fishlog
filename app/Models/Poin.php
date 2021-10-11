<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'poin',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
