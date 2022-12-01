<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tsc_type',
        'tsc_amount',
        'tsc_category',
        'tsc_detail',
        'tsc_detail2',
        'tsc_target',
        'balance',
    ];
    
}
