<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\Blog;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Platenmaatschappijen;
use function Laravel\Prompts\alert;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogPost = Blog::all();
        return $blogPost;
    }


    public function create(Request $request)
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

//        dd($request->title);
        if (!isset($request->title) || !isset($request->contents) || strlen($request->title) < 3 || strlen($request->title) > 25 || strlen($request->contents) < 10) {
            return response()->json(['message' => 'Fill in all fields'], 401);
        }

//        if (!isset($request->title) || !isset($request->contents)) {
//            return response()->json(['message' => 'Fill in all fields'], 401);
//        }
//        elseif (strlen($request->title) < 3) {
//            return response()->json(['message' => "title too short"], 401);
//        }
//        elseif ( strlen($request->title) > 25){
//            return response()->json(['message'=>"title too long"], 401);
//        }
//        elseif (strlen($request->contents) < 10) {
//            return response()->json(['message'=>"contents too short"]);
//        }



        $newBlogPost = new Blog;
        $newBlogPost->title = $request->title;
        $newBlogPost->contents = $request->contents;
        $newBlogPost->user_id = $request->user_id;
        $newBlogPost->save();
    }

    public function show($id)
    {
        $specificBlogPost = Blog::find($id);
//        dd($specificBlogPost);
        return ["blog" => $specificBlogPost];
    }

    public function delete($id)
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        $deletedBlog = Blog::find($id);
        $deletedBlog->delete();
    }

    public function update(Request $request)
    {
        if (!isset($request->title) || !isset($request->contents) || strlen($request->title) < 3 || strlen($request->contents) < 10) {
            return response()->json(['message' => 'Fill in all fields'], 401);
        }


        $updatedBlog = Blog::where("id", $request->id)->first();
        $updatedBlog->title = $request->title;
        $updatedBlog->contents = $request->contents;

        $updatedBlog->save();

    }
}
