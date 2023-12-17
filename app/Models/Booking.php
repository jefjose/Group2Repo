<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
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
