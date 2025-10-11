<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    public const KIND_CAKE = 1;
    public const KIND_PASTRY = 2;
    public const KIND_OTHER = 3;

    // 販売中
    public const STATUS_ON_SALE = 1;
    // 取り扱い終了
    public const STATUS_DISCONTINUED = 0;

    protected $fillable = [
        'kind',
        'name',
        'image',
        'status',
        'base_price',
        'size',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    public function cakeInfo(): HasOne
    {
        return $this->hasOne(CakeInfo::class);
    }
}
