<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'hubungi_kamis'; // Sesuaikan dengan nama tabel di database

    // The attributes that are mass assignable
    protected $fillable = ['name', 'email', 'message'];
}
