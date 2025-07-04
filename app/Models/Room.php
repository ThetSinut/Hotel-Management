<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_title',
        'description',
        'room_price',
        'wifi',
        'room_type',
    ];

    public $timestamps = false; // Disable timestamps
}