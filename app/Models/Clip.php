<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    // Table associated with model
    protected $table = 'my_clips';

    // Not using created_at or updated_at columns
    public $timestamps = false;
}
