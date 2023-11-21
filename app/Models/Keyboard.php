<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Keyboard extends Model
{
    use AsSource, Filterable, HasFactory;

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
        'style',
        'switches',
        'backlit',
        'tenkeyless',
        'connection_type',
        'color',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];
}
