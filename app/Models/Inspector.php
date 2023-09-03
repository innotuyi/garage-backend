<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspector extends Model
{
    use HasFactory;

    protected $table = 'Inspector';

    protected $fillable = [
        'name',
        'email'
    ];
}
