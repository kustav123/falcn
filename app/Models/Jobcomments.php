<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobcomments extends Model
{
    use HasFactory;
    protected $table = 'job_comment';

    const UPDATED_AT = null;

    protected $fillable = [
      'jbid',
      'usid',
      'type',
      'message',
      'created_at'
    ];
}
