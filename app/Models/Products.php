<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable  = ['categories_id',	'name',	'desc',	'icon'=>'required|image|mimes:jpeg,png,jpg,gif ',	'status'];

    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id');

    }

    public function Items()
    {
        return $this->hasMany(Items::class, 'products_id');
    }
}
