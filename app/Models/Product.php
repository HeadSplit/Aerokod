<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'description', 'category_id'];

    public function productcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
