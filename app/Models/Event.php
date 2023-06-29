<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Event extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,HasRoles;

    protected $guarded = [];

    // public function berlokasi(){
    //     return $this->belongsTo(Venue::class, 'venues_id');
    // }

    // public function venues(){
    //     return $this->hasManyThrough(Venue::class, Event::class);
    // }

    public function venues(){
        return $this->belongsTo(Venue::class,'venue_id', 'id');
    }

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $attributes = [
        'status' => true,
    ];
}