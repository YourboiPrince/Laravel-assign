<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Specify the primary key
    public $incrementing = true; // Indicates if the IDs are auto-incrementing

    protected $fillable = [
        'name',
        'industry',
        'orgsize',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

    // Relationships
    // Example: An organization has many employees
//     public function employees()
//     {
//         return $this->hasMany(Employee::class);
//     }

//     // Scopes
//     // Example: Order organizations by name
//     public function scopeOrderByName($query)
//     {
//         return $query->orderBy('name');
//     }

//     // Additional configurations, methods, etc. can be added here
// }
