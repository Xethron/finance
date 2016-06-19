<?php
namespace Finance\Database\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use SoftDeletes;

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'variant_id');
    }
}
