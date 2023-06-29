<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,SoftDeletes;

    protected $guarded = [];

    // public function venues(){
    //     return $this->hasManyThrough(Venue::class, Event::class);
    // }

    public function events(){
        return $this->hasMany(Event::class);
    }
}