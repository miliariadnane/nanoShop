<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Image;
use App\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        //dd($types);
        return view('backend.categories.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();

        $categorie = new Category();
        $categorie->name = $request->name;
        //$categorie->category_slug = $slug->createSlug($request->category_slug);
        $categorie->category_slug = Str::slug($request->category_slug, '_');
        $categorie->type_id = $request->type;
        $categorie->status = $request->status ? 1 : 0;
        //dd($categorie);

        $categorie->save($validatedData);

        if($request->hasFile('category_image')) {
           
            $path = $request->file('category_image')->store('categories');
        
            $categorie->image()->save(Image::make(['path' => $path]));
        }
        
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categorie = Category::where('id', $category->id)->first();
        if(is_null($categorie)){
            return abort(404);
        }
        return view('backend.categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $categorie = Category::findOrFail($id);
        if(is_null($categorie)){
            return abort(404);
        }
        return view('backend.categories.edit', compact('categorie','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories,name,'.$category->id,
            'type_id' => 'required|string',
            'category_slug' => 'required|string|max:50',
            'status' => 'required',
        ]);

        $newData = [];
        if($category->name != $request->name){
            $newData["name"] = $request->name;
        }
        if ($category->category_slug != $request->category_slug) {
            $newData["category_slug"] = Str::slug($request->category_slug, '_');
        }
        if ($category->status != $request->status) {
            $newData["status"] = $request->status;
        }
        if ($category->type_id != $request->type_id) {
            $newData["type_id"] = $request->type_id;
        }
        //dd($request->type_id);
        if($request->hasFile('category_image')) {

            $path = $request->file('category_image')->store('categories');
            
            if($category->image) {
                Storage::delete($category->image->path);
                $category->image->path = $path;
                $category->image->save();
            }
            else {
                $category->image()->save(Image::make(['path' => $path]));
            }
        }

        if($newData){
            //dd($newData);
            $category->update($newData);
        }

        return redirect()->route('categories.index');           

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
