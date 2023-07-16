<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Purchase extends Model
{
    use HasFactory, AsSource, Filterable;

    // relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship to PurchaseItem
    public function purchase_item()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    // relationship to Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'purchase_date',
        'total_amount',
        'purchase_status',
    ];
}
