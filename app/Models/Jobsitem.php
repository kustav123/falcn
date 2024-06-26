<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobsitem extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'job_item';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'jobid',
        'item',
        'make',
        'model',
        'snno',
        'proprty',
        'accessary',
        'complain',
        'remarks'
    ];
}
