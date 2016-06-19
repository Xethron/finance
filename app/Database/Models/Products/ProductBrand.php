<?php
namespace Finance\Database\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
