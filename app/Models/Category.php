<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Pktharindu\NovaPermissions\Traits\HasRoles;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,SoftDeletes;

    protected $guarded = [];
}
