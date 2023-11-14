<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'event_type',
        'event_date',
        'event_time',
        'event_address',
        'status',        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
