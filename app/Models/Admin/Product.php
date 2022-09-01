<?php
namespace App\Models\Admin;

use App\Models\Setting\Settings;
use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
    protected $guarded = array();
    protected $table = 'products';
    public function categories()
    {
        return $this->hasMany('App\Models\Admin\ProductCategory', 'product_id');
    }
}








