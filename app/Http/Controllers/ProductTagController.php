<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    
    public function index($id) {

        $tag = Tag::find($id);
        
        return view('backend.products.index', [
            'products' => $tag->products()->productWithUserCommentsTags()->get(),
        ]);

    }
    
}
