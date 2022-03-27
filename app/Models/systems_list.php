<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $url
 * @property mixed $name
 * @property mixed $developer
 * @property mixed $user
 * @property mixed $database
 * @property mixed $status
 */
class systems_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'developer',
        'user',
        'database',
        'status',
    ];
}
