<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Headphone extends Model
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
        'type',
        'frequency_response',
        'microphone',
        'wireless',
        'enclosure_type',
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
        'frequency_response'    => 'array',
    ];
}
