<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'address',
        'description',
        'size',
        'bedrooms_number',
        'bathrooms_number',
        'price',
        'year',
        'inventory_status',
        'image_path'
    ];
}
