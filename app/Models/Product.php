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



    public function computercase()
    {
        return $this->hasOne(ComputerCase::class);
    }

    public function casefan()
    {
        return $this->hasOne(CaseFan::class);
    }

    public function cpu()
    {
        return $this->hasOne(Cpu::class);
    }

    public function cpucooler()
    {
        return $this->hasOne(CpuCooler::class);
    }

    public function extstorage()
    {
        return $this->hasOne(ExtStorage::class);
    }

    public function intstorage()
    {
        return $this->hasOne(IntStorage::class);
    }

    public function fancontroller()
    {
        return $this->hasOne(FanController::class);
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

    public function soundcard()
    {
        return $this->hasOne(SoundCard::class);
    }

    public function speaker()
    {
        return $this->hasOne(Speaker::class);
    }

    public function videocard()
    {
        return $this->hasOne(VideoCard::class);
    }

    public function webcam()
    {
        return $this->hasOne(Webcam::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        // 'category',
        // 'description',
        // 'price',
        // 'status',
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
        // 'category',
        'updated_at',
        'created_at',
    ];
}
