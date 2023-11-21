<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // relationship to Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'purchase_id',
        'date_of_payment',
        'payment_type',
        'payment_status',
    ];
}
