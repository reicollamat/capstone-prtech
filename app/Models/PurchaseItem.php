<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class PurchaseItem extends Model
{
    use HasFactory, AsSource, Filterable;

    // relationship to purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }


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
    ];
}
