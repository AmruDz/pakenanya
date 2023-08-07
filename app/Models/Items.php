<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $fillable  = ['products_id',	'name',	'status',	'qty',	'capital_price',	'selling_price'	];

    public function Products()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }
}
