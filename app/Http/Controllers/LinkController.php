<?php

namespace App\Http\Controllers;


use App\Models\BlogPost;
use App\Models\Links;
use http\Env\Response;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
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

        if (!isset($request->contents) || !isset($request->title) || strlen($request->contents) < 1 || strlen($request->title) < 1 || strlen($request->title) > 25) {
            return response()->json(['message' => 'Fill in all fields'], 401);
        }

        $newLink = new Links();
        $newLink->links = $request->title;
        $newLink->body = $request->contents;

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
        if (!auth()->user()) {
            return response()->json(['message' => 'User not logged in'],401);
        }

        if (!isset($request->links) || !isset($request->body) || strlen($request->links) < 1 || strlen($request->body) < 1 || strlen($request->links) > 25) {
            return response()->json(['message' => 'Fill in the form correctly'], 401);
        }



        $updatedLink = Links::where("id", $request->id)->first();
        $updatedLink->body = $request->body;
        $updatedLink->links = $request->links;


//        dd($updatedLink->title);
        if (filter_var($request->body, FILTER_VALIDATE_URL) === FALSE) {
            return response()->json(['message' => 'Invalid link'],401);
        } else {
            $updatedLink->save();
        }
    }

};
