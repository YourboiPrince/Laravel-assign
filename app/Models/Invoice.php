<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'contact_id',
        // 'quote_id',
        'invoice_number',
        'invoice_date',
        'due_date',
        'total',
    ];

    // Relationships
    public function account()
    {
        return $this->belongsTo(Organization::class, 'account_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    // public function quote()
    // {
    //     return $this->belongsTo(Quote::class, 'quote_id');
    // }
}
