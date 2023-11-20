<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ComputerCase extends Model
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
        'type',
        'color',
        'psu',
        'sidepanel',
        'external_525_bays',
        'internal_35_bays',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];
}
