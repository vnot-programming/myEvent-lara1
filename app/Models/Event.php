<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// use Mostafaznv\Larupload\Enums\LaruploadMediaStyle;
// use Mostafaznv\Larupload\Enums\LaruploadMode;
// use Mostafaznv\Larupload\Enums\LaruploadNamingMethod;
// use Mostafaznv\Larupload\Storage\Attachment;
// use Mostafaznv\Larupload\Traits\Larupload;

class Event extends Model
{
    // use HasApiTokens, HasFactory, Notifiable, SoftDeletes,HasRoles,Larupload;
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

    // public function attachments(): array
    // {
    //     return [
    //         Attachment::make('video', LaruploadMode::LIGHT)
    //             ->namingMethod(LaruploadNamingMethod::HASH_FILE)
    //             ->coverStyle('cover', 852, 480, LaruploadMediaStyle::AUTO)
    //     ];
    // }
}
