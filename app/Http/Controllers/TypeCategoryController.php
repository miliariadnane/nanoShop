<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCategoryRequest;
use App\Type;
use Illuminate\Http\Request;

class TypeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('backend.typeCategory.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.typeCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeCategoryRequest $request)
    {
        // $request->validate([
        //     'libelle' => 'required|unique:types|max:15',
        // ]);

        $validatedData = $request->validated();

        Type::create($validatedData);
        return redirect('types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('backend.typeCategory.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeCategoryRequest $request, $id)
    {
        // $request->validate([
        //     'libelle' => 'required|unique:types|max:15',
        // ]);

        $type = Type::findOrFail($id);

        $validatedData = $request->validated();
        $type->update($validatedData);

        return redirect('types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type = Type::where('id', $type->id)->first();
        $type->delete();
        return redirect('types');
    }
}
