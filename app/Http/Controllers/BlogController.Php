<?php

namespace App\Http\Controllers;


use App\Models\BlogPost;
use http\Env\Response;
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
        if (!auth()->user()-token()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        $validated = $request->validate([
           'title'=>'required',
           'contents'=>'required'
        ]);

        $newBlogPost = new BlogPost;
        $newBlogPost->title = $validated['title'];
        $newBlogPost->body = $validated['contents'];

        $newBlogPost->save();
    }

    public function show($id) {
        $specificBlogPost = BlogPost::find($id);
//        dd($specificBlogPost);
        return ["blog"=>$specificBlogPost];
    }

    public function delete($id){
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        $deletedBlog = BlogPost::find($id);
        $deletedBlog->delete();
    }


};
