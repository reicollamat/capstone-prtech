<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class PurchaseItem extends Model
{
    use AsSource, Filterable, HasFactory;

    // relationship to purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function item_returnrefund_info()
    {
        return $this->hasOne(ItemReturnrefundInfo::class);
    }

    // // relationship to Payment
    // public function payment()
    // {
    //     return $this->hasOne(Payment::class);
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'total_price',
        'comment_id',
    ];
}
