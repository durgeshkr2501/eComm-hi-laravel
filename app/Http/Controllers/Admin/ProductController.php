<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\file;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function listing()
    {
        $data = Product::latest()->paginate(10);
        
        return view('admin.products.listing', ['products' => $data]);
    }


    public function create()
    {
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.products.manage-product',compact('categories'));
    }

    public function store(Request $request)
    {

        if (is_null($request->get('id'))) {
            $product = new Product();
        } else {
            $product = Product::find($request->get('id'));
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->product_discount = $request->product_discount;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->status = $request->status == "on" ? '1' : '0';

        $fileName = "";
        $destinationPath = "";
        $images = [];
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $key => $file) {

                $fileName = time() . "-" . $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();

                $destinationPath = "images/products";

                $file->move($destinationPath, $fileName);
                $fileName = $destinationPath . "/" . $fileName;
                $product->gallery = $fileName;

                array_push($images, $fileName);
            }
        }


        $product->save();

        //$images
        if (count($images)) {
            foreach ($images as $key => $value) {
                $image = new Media();
                $image->product_id = $product->id;
                $image->file_name = $value;
                $image->file_type = "image";
                $image->save();
            }
        }

        return redirect(route('products.listing'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.products.manage-product', ['product' => $product, 'categories' => $categories]);
    }
    public function update(Request $request)
    {
        // $product = product::find($request->id);
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->category = $request->category;
        // $product->description = $request->description;
        //$product->save();
        // return redirect('admin.products.manage-product',['product' => $product]);
    }
    public function deleteProduct($id)
    {

        /*  try {
            //code...
            $product = Product::find($id);
            $result = $product->delete();
        } catch (\Throwable $th) {
            throw $th;
        }*/
        $product = Product::find($id);
        $destinationPath = "images/products";
        if (file::exists($destinationPath)) {

            file::delete($destinationPath);
        }
        $product->delete();

        return back();
    }

    public function Status_Update($id)
    {

        $product = Product::find($id);

        $product->status = $product->status == "1" ? "0" : "1";
        $product->save();

        return back();
    }
    public function remove_Image($id)
    {
       // file::destroy();
        //return back();

        $product = Media::find($id);
        $result = $product->delete();
        return back();
    }
   
}
