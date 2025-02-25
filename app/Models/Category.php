<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'image_url',
    ];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
