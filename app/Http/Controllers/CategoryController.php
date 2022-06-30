<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use PHPUnit\Framework\ComparisonMethodDoesNotAcceptParameterTypeException;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::whereNull('category_id')->get();
        return view('admin.category.add', compact('categories'));
    }

    public function addCategory(Request $request)
    {
    //   dd($request->all());
   

        if (is_null($request->get('id'))) {
            $Category = new Category();
            $Category->slug = Str::slug($request->name);
        } else {
            $Category= Category::find($request->get('id'));
        }

        if($request->has('category_id') && !is_null($request->get('category_id'))) {
            $Category->category_id = $request->get("category_id");
        }
        $Category->name = $request->name;
        $Category->status = $request->status == "on" ? '1' : '1';
       
        $Category->save();
        return redirect()->route('category.list' );
    }

    public function CategoryList()
    {
        $categories = Category::where('status','1')->get();

        $categories = Category::latest()->get();

        return view('admin.category.list',compact('categories'));
    }
    public function Category_edit(Request $request,Category $category){
        
        $id = $request->id;
       
        $categories = Category::whereNull('category_id')->get();
        $category = Category::find($id);
        
       return view('admin.category.add',compact('category','categories'));

    }
    public function Category_delete($id){
           
            
            $data = Category::find($id);
            $result = $data->delete();
            return back();
         
    }
}
