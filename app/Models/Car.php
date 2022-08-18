<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'userId', 'plateNo', 'chasisNo', 'make', 'model', 'engineNo', 'category', 'bodyType', 'mileage', 'color', 'value'
    ];
}
