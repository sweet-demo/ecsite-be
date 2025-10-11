<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Allergie extends Model
{
    // 特定原材料8品目
    public const SPECIFIC_RAW_MATERIAL = 1;
    // 特定原材料8品目以外 (表示推奨レベル)
    public const RECOMMENDED_DISPLAY = 2;

    protected $fillable = [
        'name',
        'kind',
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'allergie_product', 'allergie_id', 'product_id');
    }
}
