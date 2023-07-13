<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Bookmark extends Model
{
    use HasFactory, AsSource, Filterable;

    /**
     * @var string
     */
    protected $table = 'bookmarks';

    // relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship to Product
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
        'user_id',
        'product_id',
    ];
}
