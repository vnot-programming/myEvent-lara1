<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Venue extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    // public function venues(){
    //     return $this->hasManyThrough(Venue::class, Event::class);
    // }

    public function event(){
        return $this->hasMany(Event::class);
    }
}
