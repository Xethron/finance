<?php
namespace Finance\Database\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes;
    
    public function types()
    {
        return $this->hasMany(ProductType::class, 'category_id');
    }
}
