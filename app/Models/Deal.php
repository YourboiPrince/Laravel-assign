<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $table = 'deals'; // Specify the table name

    protected $fillable = [
        'account_id',
        'contact_id',
        // 'stage',
        'value',
        'probability',
        'expected_close_date',
        'notes',
        'created_at', // if you haven't customized the timestamp names
        'updated_at', // if you haven't customized the timestamp names
    ];

    // If you have timestamps (created_at, updated_at) in your table
    public $timestamps = true;

    // You can customize the timestamp column names if they differ from the defaults
    // const CREATED_AT = 'custom_created_at';
    // const UPDATED_AT = 'custom_updated_at';

    // Define relationships with other models
    public function account()
    {
        return $this->belongsTo(Organization::class, 'account_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    // public function dealStage()
    // {
    //     return $this->belongsTo(DealStage::class, 'stage');
    // }
}
