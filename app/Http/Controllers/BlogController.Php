<?php

namespace App\Http\Controllers;

use App\Models\ArtistInfo;
use App\Models\BlogPost;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Platenmaatschappijen;
use function Laravel\Prompts\alert;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogPost = BlogPost::all();
        return $blogPost;
    }


    public function create(Request $request)
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        if (!isset($request->title) || !isset($request->contents) || strlen($request->title) < 3 || strlen($request->title) > 25 || strlen($request->contents) < 10) {
            return response()->json(['message' => 'Fill in all fields'], 401);
        }


        $newBlogPost = new BlogPost;
        $newBlogPost->title = $request->title;
        $newBlogPost->body = $request->contents;

        $newBlogPost->save();
    }

    public function show($id)
    {
        $specificBlogPost = BlogPost::find($id);
//        dd($specificBlogPost);
        return ["blog" => $specificBlogPost];
    }

    public function delete($id)
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        $deletedBlog = BlogPost::find($id);
        $deletedBlog->delete();
    }

    public function update(Request $request)
    {
        if (!isset($request->title) || !isset($request->body) || strlen($request->title) < 3 || strlen($request->body) < 10) {
            return response()->json(['message' => 'Fill in all fields'], 401);
        }


        $updatedBlog = BlogPost::where("id", $request->id)->first();
        $updatedBlog->title = $request->title;
        $updatedBlog->body = $request->body;

        $updatedBlog->save();

    }
}
