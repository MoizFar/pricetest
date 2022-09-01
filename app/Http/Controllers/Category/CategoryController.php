<?php
namespace App\Http\Controllers\Category;
use Illuminate\Http\Request;
use App\Models\Admins\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\GlobalHelper\SimilarResponse;

class CategoryController extends Controller
{
    public function categories(Request $request)
    {
        $data['results'] =  Category::get();
        return view('admin.category.index' ,compact('data'));

    }

   public function category($id=-1){
     dd('df');
    $data['page_title'] = "Add Category";
    if($id!=-1){
        $data['page_title']="Update Category";
        $data['results'] =  Category::where("id",$id)->first();

    }
     return view("admin.category.save",compact('data'));
   }

    public function savecategory(Request $request)
    {
        $id = $request->id;
        $modal = new Category;
        $data = $request->all();
        //  dd($data);
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = Category::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $affected_rows =  $modal::create($data);
        }

    }
    public function deleteproductcategory($id)
    {
        Category::find($id)->delete();
        return SimilarResponse::next("ok");
    }
  
}
?>

