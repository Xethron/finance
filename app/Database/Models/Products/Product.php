<?php
namespace Finance\Database\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id')->withTrashed();
    }
    
    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id')->withTrashed();
    }
}
