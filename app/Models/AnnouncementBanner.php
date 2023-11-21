<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class AnnouncementBanner extends Model
{
    use AsSource, Filterable, HasFactory;

    protected $table = 'banner_announcements';

    protected $fillable = [
        'announcement',
        'category',
        'validity_start',
        'validity_end',
    ];
}
