<?php

namespace App\Http\Controllers;


use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\Platenmaatschappijen;
use function Laravel\Prompts\alert;

class BlogController extends Controller
{
    public function index(Request $request){

        $blogPost = BlogPost::all();
        return $blogPost;
    }

    public function create(Request $request){
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        $validated = $request->validate([
           'title'=>'required',
           'body'=>'required'
        ]);

        $newBlogPost = new BlogPost();
        $newBlogPost->title = $validated['title'];
        $newBlogPost->body = $validated['body'];

        $newBlogPost->save();
    }

    public function delete(Request $request){
//
    }


};
