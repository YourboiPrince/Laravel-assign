<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes'; // Specify the table name

    protected $fillable = [
        'deal_id',
        'account_id',
        'contact_id',
        'quote_date',
        'expiry_date',
        'total',
        'status',
    ];



    // If you have timestamps (created_at, updated_at) in your table
    public $timestamps = true;



    // You can customize the timestamp column names if they differ from the defaults
    const CREATED_AT = 'custom_created_at';
    const UPDATED_AT = 'custom_updated_at';

    // Define relationships with other models
    public function account()
    {
        return $this->belongsTo(Organization::class, 'account_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
