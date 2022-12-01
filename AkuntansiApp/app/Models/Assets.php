<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asset_type',
        'asset_name',
        'asset_loc',
        'asset_building_price',
        'asset_land_price',
    ];
}
