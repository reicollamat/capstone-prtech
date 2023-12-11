<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseReturnrefundInfo extends Model
{
    use HasFactory;

    public function purchase_item(): BelongsTo
    {
        return $this->belongsTo(PurchaseItem::class);
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
        'purchase_item_id',
        'user_id',
        'seller_id',
        'request_date',
        'status',
        'reason',
        'refund_option', // full-refund or partial-refund
        'approved_date',
        'returned_date',
    ];
}
