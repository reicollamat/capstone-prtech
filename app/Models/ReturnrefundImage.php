<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnrefundImage extends Model
{
    use HasFactory;

    public function item_returnrefund_info()
    {
        return $this->belongsTo(ItemReturnrefundInfo::class);
    }


    protected $fillable = [
        'item_returnrefund_info_id',
        'user_id',
        'img_path',
    ];
}
