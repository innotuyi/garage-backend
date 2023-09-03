<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;

    protected $fillable = [
        'cooperativeName',
        'cooperativeLocation',
        'numberOfMembers',
        'productsOrServicesOffered'
    ];

    protected $table = 'Cooperative';
}
