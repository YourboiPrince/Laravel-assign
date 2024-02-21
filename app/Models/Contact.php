<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Specify the primary key
    public $incrementing = true; // Indicates if the IDs are auto-incrementing

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone', // Add the 'phone' field to the $fillable array
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Additional configurations, methods, relationships, etc. can be added here
}
