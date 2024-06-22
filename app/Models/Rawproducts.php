<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawproducts extends Model
{
    use HasFactory;
    protected $table = 'raw_product';

    // Disable the 'updated_at' timestamp
    const UPDATED_AT = null;

    // Specify the fillable attributes
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'created_by',
        'unit',
        'current_stock',
        'remarks',
        'status'
    ];

}
