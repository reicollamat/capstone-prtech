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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    protected $fillable = [
        'shipment_number',
        'purchase_id',
        'user_id',
        'seller_id',
        'email',
        'phone_number',
        'shipment_status',
        'start_date',
        'shipped_date',
        'street_address_1',
        'street_address_2',
        'state_province',
        'city',
        'postal_code',
        'country',
    ];
}
