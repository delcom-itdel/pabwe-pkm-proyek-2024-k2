<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'hubungikami'; // Use the singular form

    // The attributes that are mass assignable
    protected $fillable = ['info_hubungikami'];
}
