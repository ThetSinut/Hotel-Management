<?php

namespace App\Models;
use HasFactory;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
