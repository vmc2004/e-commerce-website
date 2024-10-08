<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'slug',
        'image',
        'price',
        'price_sale',
        'description',
        'material',
        'category_id',
        'brand_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
