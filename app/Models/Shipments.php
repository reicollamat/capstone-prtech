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
        'street_address_1',
        'street_address_2',
        'city',
        'postal_code',
        'state_province',
        'country',
    ];
}
