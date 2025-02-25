<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'category_id',
        'type',
    ];

    public function productSizes() {
        return $this->hasMany(ProductSize::class);
    }

    public function mainImage() {
        return $this->hasOne(ProductImage::class)->where('image_main', 1);
    }

    public function subImage() {
        return $this->hasMany(ProductImage::class)->where('image_main', 0);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
