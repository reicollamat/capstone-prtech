<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Cviebrock\EloquentSluggable\Sluggable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;

class Product extends Model
{
    use HasFactory, AsSource, Sluggable, Filterable;

    /**
     * @var string
     */
    protected $table = 'products';


    // relationship to Bookmark
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'price',
        'status',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
           'id'         => Where::class,
           'title'       => Like::class,
           'category'      => Like::class,
           'updated_at' => WhereDateStartEnd::class,
           'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'title',
        'category',
        'updated_at',
        'created_at',
    ];
}
