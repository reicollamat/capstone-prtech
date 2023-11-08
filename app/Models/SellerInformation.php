<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SellerInformation extends Model
{
    use HasFactory;

    /**
     * Get the Seller Account that owns the seller information.
     */
    public function useraccount(): BelongsTo
    {
        return $this->belongsTo(SellerAccount::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_name',
        'registered_business_name',
        'pickup_address',
        'email',
        'phone_number',
        'seller_type',
        'registered_address',
        'city',
        'postal_code',
        'tin_number',
        'business_permit',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];
}
