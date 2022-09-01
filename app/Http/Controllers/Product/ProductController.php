<?php

namespace App\Http\Controllers\Product;

use Auth;
use Imagick;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Setting\Settings;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Product;
use App\Http\GlobalHelper\SimilarResponse;

class ProductController extends Controller
{
    public function products()
    {

        $data['page_title'] = "Products";
        $data['results'] =  Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', compact('data'));
    }
    public function product($id = -1)
    {
        $data['page_title'] = "Add Product" ;
        if ($id != -1) {
            $data['page_title'] = "Update Product";
            $data['results'] =  Product::where("id", $id)->first();
           
        }

        $data['categories'] =  Category::get();

        return view('admin.product.save', compact('data'));
    }
    public function saveproduct(Request $request)
    {
        // dd('dfg');
        $id = $request->id;
        $modal = new Product;
        $data = $request->all();
       // dd($data);
        $action = "Added";

        if ($id) {
            $action = "Updated";
            $modal = Product::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $affected_rows =  $modal::create($data);
        }
 
    }
   
    public function deleteproduct($id)
    {
        // dd('dfg');
        Product::find($id)->delete();
        return SimilarResponse::next("ok");
    }
  

   
 
}
