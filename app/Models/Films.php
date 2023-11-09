<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $title
 */
class Films extends Model
{
    protected $fillable = ['title', 'description', 'duration', 'age_limit', 'photo'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
