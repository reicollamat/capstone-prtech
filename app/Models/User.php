<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // relationship to Bookmark
    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }

    // relationship to shipment
    public function shipment(): HasMany
    {
        return $this->hasMany(Shipments::class);
    }


    // relationship to CartItem
    public function cart_item()
    {
        return $this->hasMany(CartItem::class);
    }

    // relationship to Purchase
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }

    public function seller(): HasOne
    {
        return $this->hasOne(SellerInformation::class,);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'profile_picture',
        'birthdate',
        'sex',
        'phone_number',
        'street_address_1',
        'street_address_2',
        'city',
        'postal_code',
        'state_province',
        'country',
        'permissions',
        'is_seller'
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
        'email_verified_at' => 'datetime',
        'is_seller' => 'boolean'
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id' => Where::class,
        'name' => Like::class,
        'email' => Like::class,
        'updated_at' => WhereDateStartEnd::class,
        'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];
}
