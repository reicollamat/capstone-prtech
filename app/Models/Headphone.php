<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Headphone extends Model
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
        'connection_type',
        'frequency_response',
        'microphone',
        'wireless',
        'enclosure_type',
        'noise_control',
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
        'noise_control' => 'array',
        'connection_type' => 'array',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
