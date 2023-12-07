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

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
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
