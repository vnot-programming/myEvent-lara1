<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ticket extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,HasRoles;

    protected $guarded = [];
    protected $fillable = [
        'tittle',
        'price',
        'quantity',
        'description',
        'customer_limit',
        'sale_start_date',
        'sale_end_date',
        'sale_price',
        'status',
    ];

    // public function berlokasi(){
    //     return $this->belongsTo(Venue::class, 'venues_id');
    // }

    // public function venues(){
    //     return $this->hasManyThrough(Venue::class, Event::class);
    // }

    public function events(){
        return $this->belongsTo(Event::class,'event_id', 'id');
    }

    protected $casts = [
        'sale_start_date' => 'datetime',
        'sale_end_date' => 'datetime',
    ];

    protected $attributes = [
        'status' => true,
    ];
}