<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardInquiry extends Model
{
    protected $fillable = [
        'company_name',
        'contact_name',
        'email',
        'phone',
        'design_type',
        'quantity',
        'intent',
        'notes',
        'status',
    ];
}
