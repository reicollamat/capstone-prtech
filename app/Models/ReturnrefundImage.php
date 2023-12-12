<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnrefundImage extends Model
{
    use HasFactory;

    public function purchase_returnrefund_info()
    {
        return $this->belongsTo(PurchaseReturnrefundInfo::class);
    }


    protected $fillable = [
        'purchase_returnrefund_info_id',
        'user_id',
        'img_path',
    ];
}
