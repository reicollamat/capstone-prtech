<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipments extends Model
{
    use HasFactory;

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }

    protected $fillable = [
        'purchase_id',
        'user_id',
        'email',
        'phone_number',
        'shipment_status',
        'referenceId',
        'shippeddate',
        'street_address_1',
        'street_address_2',
        'state_province',
        'city',
        'postal_code',
        'country',
    ];
}
