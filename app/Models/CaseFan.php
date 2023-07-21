<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class CaseFan extends Model
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
        'size',
        'color',
        'rpm',
        'airflow',
        'noise_level',
        'pwm',
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
        'rpm'               => 'array',
        'airflow'           => 'array',
        'noise_level'       => 'array',
    ];
}
