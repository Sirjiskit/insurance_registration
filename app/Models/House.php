<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $table = 'home';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'userId', 'bedRooms', 'baths', 'pool', 'fenced', 'roofType', 'roofage', 'floorType', 'garage', 'value'
    ];
}
