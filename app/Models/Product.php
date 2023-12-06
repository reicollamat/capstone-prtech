<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Screen\AsSource;

class Product extends Model
{
    use AsSource, Filterable, HasFactory, Sluggable, Sortable;

    /**
     * @var string
     */
    protected $table = 'products';

    // relationship to ProductImage
    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // relationship to Bookmark
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    // relationship to CartItem
    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function category($category)
    {
        if ($category == 'computer_case') {
            return $this->hasOne(ComputerCase::class);
        } elseif ($category == 'case_fan') {
            return $this->hasOne(CaseFan::class);
        } elseif ($category == 'cpu') {
            return $this->hasOne(Cpu::class);
        } elseif ($category == 'cpu_cooler') {
            return $this->hasOne(CpuCooler::class);
        } elseif ($category == 'ext_storage') {
            return $this->hasOne(ExtStorage::class);
        } elseif ($category == 'int_storage') {
            return $this->hasOne(IntStorage::class);
        } elseif ($category == 'headphone') {
            return $this->hasOne(Headphone::class);
        } elseif ($category == 'keyboard') {
            return $this->hasOne(Keyboard::class);
        } elseif ($category == 'memory') {
            return $this->hasOne(Memory::class);
        } elseif ($category == 'monitor') {
            return $this->hasOne(Monitor::class);
        } elseif ($category == 'motherboard') {
            return $this->hasOne(Motherboard::class);
        } elseif ($category == 'mouse') {
            return $this->hasOne(Mouse::class);
        } elseif ($category == 'psu') {
            return $this->hasOne(Psu::class);
        } elseif ($category == 'speaker') {
            return $this->hasOne(Speaker::class);
        } elseif ($category == 'video_card') {
            return $this->hasOne(VideoCard::class);
        } elseif ($category == 'webcam') {
            return $this->hasOne(Webcam::class);
        }
    }

    public function computer_case()
    {
        return $this->hasOne(ComputerCase::class);
    }

    public function case_fan()
    {
        return $this->hasOne(CaseFan::class);
    }

    public function cpu()
    {
        return $this->hasOne(Cpu::class);
    }

    public function cpu_cooler()
    {
        return $this->hasOne(CpuCooler::class);
    }

    public function ext_storage()
    {
        return $this->hasOne(ExtStorage::class);
    }

    public function int_storage()
    {
        return $this->hasOne(IntStorage::class);
    }

    public function headphone()
    {
        return $this->hasOne(Headphone::class);
    }

    public function keyboard()
    {
        return $this->hasOne(Keyboard::class);
    }

    public function memory()
    {
        return $this->hasOne(Memory::class);
    }

    public function monitor()
    {
        return $this->hasOne(Monitor::class);
    }

    public function motherboard()
    {
        return $this->hasOne(Motherboard::class);
    }

    public function mouse()
    {
        return $this->hasOne(Mouse::class);
    }

    public function psu()
    {
        return $this->hasOne(Psu::class);
    }

    public function speaker()
    {
        return $this->hasOne(Speaker::class);
    }

    public function video_card()
    {
        return $this->hasOne(VideoCard::class);
    }

    public function webcam()
    {
        return $this->hasOne(Webcam::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function purchase_items(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seller_id',
        'title',
        'SKU',
        'slug',
        'category',
        'price',
        'image',
        'status',
        'condition',
        'stock',
        'reserve',
        'rating',
        'purchase_count',
        // relation to the seller id
        'seller_id',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id' => Where::class,
        'title' => Like::class,
        'category' => Like::class,
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
        'stock',
        'updated_at',
        'created_at',
    ];

    public $sortable = [
        'title',
        'price',
        'stock',
        'rating',
        'purchase_count',
    ];

    protected $casts = [
        'image' => 'array',
    ];
}
