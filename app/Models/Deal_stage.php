<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal_stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        // Add any other fields from your actual table
    ];

    // If you don't want timestamps for this model, you can set the following property to false
    public $timestamps = true;

}
