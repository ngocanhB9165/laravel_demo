<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'description', 'category_id', 'status'];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function scopeSearch($query)
    {
        if(request()->keyword){
            
            $query = $query->where('name','like','%'.request()->keyword.'%');
        }
        return $query;
    }
}
