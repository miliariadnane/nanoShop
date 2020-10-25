<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsRequest;
use App\Image;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::productWithCategoriesTags()->get(); // scope utiliser dans model Product
        //$products = Product::withCount('category')->with('category.type')->get();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $validatedData = $request->validated();

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit = $request->unit;
        $product->product_quantity = $request->product_quantity;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->status = $request->status ? 1 : 0;

        $product->category_id = $request->category;
        //dd($product);
        $product->save($validatedData);

        if($request->hasFile('image_product')) {
           
            $path = $request->file('image_product')->store('products');
        
            $product->image()->save(Image::make(['path' => $path]));
        }

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //$tags = Tag::all();
        $product = Product::withCount('category')->with(['comments','category.type'])->where('id', $product->id)->first();
        if(is_null($product)){
            return abort(404);
        }
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        if(is_null($product)){
            return abort(404);
        }
        return view('backend.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:products,name,'.$product->id,
            'description' => 'required|string',
            'unit' => 'required|max:10',
            'price' => 'required|max:15',
            'sale_price' => 'required|max:15',
            'product_quantity' => 'required',
            'meta_title' => 'required|max:50',
            'meta_description' => 'required|max:150',
            'category_id' => 'required|string',
            'status' => 'required',
        ]);

        $newData = [];
        if($product->name != $request->name){
            $newData["name"] = $request->name;
        }
        if ($product->description != $request->description) {
            $newData["description"] = $request->description;
        }
        if ($product->unit != $request->unit) {
            $newData["unit"] = $request->unit;
        }
        if ($product->price != $request->price) {
            $newData["price"] = $request->price;
        }
        if ($product->sale_price != $request->sale_price) {
            $newData["sale_price"] = $request->sale_price;
        }
        if ($product->product_quantity != $request->product_quantity) {
            $newData["product_quantity"] = $request->product_quantity;
        }
        if ($product->meta_title != $request->meta_title) {
            $newData["meta_title"] = $request->meta_title;
        }
        if ($product->meta_description != $request->meta_description) {
            $newData["meta_description"] = $request->meta_description;
        }
        if ($product->status != $request->status) {
            $newData["status"] = $request->status;
        }
        if ($product->category_id != $request->category_id) {
            $newData["category_id"] = $request->category_id;
        }
        //dd($request->type_id);

        if($request->hasFile('image_product')) {

            $path = $request->file('image_product')->store('products');

            if($product->image) {
                Storage::delete($product->image->path);
                $product->image->path = $path;
                $product->image->save();
            }
            else {
                $product->image()->save(Image::make(['path' => $path]));
            }
        }

        if($newData){
            //dd($newData);
            $product->update($newData);
        }

        return redirect()->route('products.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
