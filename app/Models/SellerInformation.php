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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_name',
        'registered_business_name',
        'shop_email',
        'shop_phone_number',
        'shop_address',
        'shop_city',
        'shop_state_province',
        'shop_postal_code',
        'registered_address',
        'registered_city',
        'registered_state_province',
        'registered_postal_code',
        'seller_type',
        'business_permit',
        //reference of user id
        'user_id'
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
