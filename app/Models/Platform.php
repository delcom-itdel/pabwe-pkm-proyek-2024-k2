<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'platform'; // Use the singular form

    // The attributes that are mass assignable
    protected $fillable = ['name', 'url'];
}