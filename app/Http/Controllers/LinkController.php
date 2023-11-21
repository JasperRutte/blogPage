<?php

namespace App\Http\Controllers;


use App\Models\BlogPost;
use App\Models\Links;
use http\Env\Response;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class LinkController extends Controller
{
    public function index(){

        $links = Links::all();
        return $links;
    }


    public function create(Request $request){
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        $validated = $request->validate([
            'title'=>'required',
            'contents'=>'required'
        ]);

        $newLink = new Links;
        $newLink->links = $validated['title'];
        $newLink->body = $validated['contents'];

        $newLink->save();
    }

    public function show($id) {
        $specificLink = Links::find($id);
//        dd($specificBlogPost);
        return ["link"=>$specificLink];
    }

    public function delete($id){
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        $deletedLink = Links::find($id);
        $deletedLink->delete();
    }


};
