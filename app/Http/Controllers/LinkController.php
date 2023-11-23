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

        if (filter_var($newLink->body, FILTER_VALIDATE_URL) === FALSE) {
            return response()->json(['message' => 'Invalid link'],401);
        } else {
            $newLink->save();
        }

    }

    public function show($id) {
//        dd("Test");

        $specificLink = Links::find($id);
        return ["link"=>$specificLink];
    }

    public function delete($id){
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        $deletedLink = Links::find($id);
        $deletedLink->delete();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'links'=>'required',
            'body'=>'required'
        ]);


        $updatedLink = Links::where("id", $request->id)->first();
        $updatedLink->links = $request->links;
        $updatedLink->body = $request->body;
        $updatedLink->save();
    }

};
