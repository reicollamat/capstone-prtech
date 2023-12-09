<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Purchase extends Model
{
    use AsSource, Filterable, HasFactory;

    // relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship to Seller
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    // relationship to PurchaseItem
    public function purchase_items()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    // relationship to Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // relationship to Shipments
    public function shipment()
    {
        return $this->hasOne(Shipments::class);
    }

    // relationship to PurchaseCancellationInfo
    public function purchase_cancellation_info()
    {
        return $this->hasOne(PurchaseCancellationInfo::class);
    }

    // relationship to PurchaseReturnrefundInfo
    public function purchase_returnrefund_info()
    {
        return $this->hasOne(PurchaseReturnrefundInfo::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'seller_id',
        'reference_number',
        'purchase_date',
        'total_amount',
        'completion_date',
        'purchase_status',
    ];
}
