<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Webcam extends Model
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
        'resolutions',
        'connection',
        'focus_type',
        'os',
        'fov',
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
        'resolutions'       => 'array',
        'os'                => 'array',
    ];
}
