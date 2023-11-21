<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ExtStorage extends Model
{
    use AsSource, Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category',
        'name',
        'brand',
        'price',
        'type',
        'interface',
        'capacity',
        'price_per_gb',
        'color',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
