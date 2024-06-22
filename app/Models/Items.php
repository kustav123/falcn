<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'item';
    const UPDATED_AT = null;
    protected $fillable = [
        'id',
        'name',
        'accessary',
        'complain',
        'make',
        'remarks',
        'status',
        'created_by',
        'created_at',
    ];
}

