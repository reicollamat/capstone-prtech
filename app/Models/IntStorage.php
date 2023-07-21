<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class IntStorage extends Model
{
    use HasFactory, AsSource, Filterable;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category',
        'name',
        'price',
        'capacity',
        'price_per_gb',
        'type',
        'cache',
        'form_factor',
        'interface',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];
}
