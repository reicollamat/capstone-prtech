<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentimentImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'seller_id',
    ];
}
