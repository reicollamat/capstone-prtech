<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Speaker extends Model
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
        'brand',
        'price',
        'configuration',
        'wattage',
        'frequency_response',
        'color',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'frequency_response' => 'array',
    ];
}
