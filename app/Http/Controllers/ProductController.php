<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function addnew(Request $request)
    {
        $lstCategory = Category::all();
        $data = [
            'lstCategory' => $lstCategory
        ];

        return view('admin.product.addnew', $data);
    }
    public function store(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $image = $request->file('image');
        if($image){
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);
        }else{
            $image_name = '';
        }

        $product = new Product();

        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->category_id = $category_id;
        $product->image = $image_name;

        $product->save();

        return redirect()->route('admin.product')->with('success', 'Add new product seccessfully');
    }
    public function edit(request $request, $id)
    {
        $prd = Product::find($id);

        if(!$prd)
        {
            return redirect()->route('admin.product')->with('error', 'Product not found');
        }

        $lstCategory = Category::all();
        $data = [
            'prd' => $prd,
            'lstCategory' => $lstCategory
        ];

        return view('admin.product.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $image = $request->file('image');
        if($image){
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);
        }else{
            $image_name = '';
        }

        $product = Product::find($id);

        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->category_id = $category_id;
        $product->image = $image_name;

        $product->save();

        return redirect()->route('admin.product')->with('success', 'Update product seccessfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Delete product seccessfully');
    }
    public function indexAPI()
    {
        $lstPrd = Product::orderBy('updated_at', 'desc')->get();

        return response()->json($lstPrd);
    }
}
