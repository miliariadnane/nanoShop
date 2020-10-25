<?php

namespace App\Http\Controllers;

use App\Events\CommentPosted;
use App\Http\Requests\StoreComment;
use App\Events\CommentPosted as MyCommentPosted;
use App\Mail\commentProductMarkdown;
use App\Product;
use Illuminate\Support\Facades\Mail;

class ProductCommentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function store(StoreComment $request, Product $product) {
        
        $comment = $product->comments()->create([
            'content' => $request->content,
            'user_id' => $request->user()->id
        ]);

        // send email by the mothod of events and listeners
        event(new MyCommentPosted($comment));



        //Mail::to($product->user->email)->send(new commentProductMarkdown($comment));
        //Mail::to($product->user->email)->queue(new commentProductMarkdown($comment));
        
        //$when = now()->addMinutes(1);
        //Mail::to($product->user->email)->later($when, new commentProductMarkdown($comment));

        return redirect()->back();
    }
}
