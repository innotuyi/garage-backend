<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rca extends Model
{
    use HasFactory;

    protected $table = 'RCA';

    protected $fillable = [
        'inspectionID',
        'rootCauseDescription',
        'impact',
        'correctiveAction'
    ];
}
