<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.add');
    }

    public function addCategory(Request $request)
    {
        if (is_null($request->get('id'))) {
            $Category = new Category();
        } else {
            $Category= Category::find($request->get('id'));
        }

        $Category->name = $request->name;
        $Category->slug = Str::slug($request->name);
        $Category->status = $request->status == "on" ? '1' : '1';
       
        $Category->save();
        return redirect()->route('category.create');
    }

    public function CategoryList()
    {

        $data = Category::latest()->get();

        return view('admin.category.list',['categories' => $data]);
    }
    public function Category_edit($id){
        $category = Category::find($id);
      
       return view('admin.category.add',compact('category'));

    }
    public function Category_delete($id){
           
            
            $data = Category::find($id);
            $result = $data->delete();
            return back();
         
    }
}
