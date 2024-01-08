<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\Link;
use http\Env\Response;
use Illuminate\Http\Request;
//use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use function Laravel\Prompts\alert;

class LinkController extends Controller
{
    public function index(){
        $links = Link::all();
        return $links;
    }


    public function create(Request $request){
//        if (!auth()->user()) {
//            return response()->json(['message' => 'User not logged in'],401);
//        }

        if (!isset($request->contents) || !isset($request->title) || strlen($request->contents) < 1 || strlen($request->contents) > 2000 || strlen($request->title) < 1 || strlen($request->title) > 50) {
            return response()->json(['message' => 'Fill in all fields'], 401);
        }


        $newLink = new Link();
        $newLink->title = $request->title;
        $newLink->contents = $request->contents;
        $newLink->user_id = $request->user_id;

        if (filter_var($newLink->contents, FILTER_VALIDATE_URL) === FALSE) {
            return response()->json(['message' => 'Invalid link'],401);
        } else {
            $newLink->save();
        }
    }

    public function show($id) {


        $specificLink = Link::find($id);
        return ["link"=>$specificLink];
    }

    public function delete($id){
        $deletedLink = Link::find($id);
        $deletedLink->delete();
    }

    public function update(Request $request)
    {
        if (!isset($request->contents) || !isset($request->title) || strlen($request->contents) < 1 || strlen($request->contents) > 2000 || strlen($request->title) < 1 || strlen($request->title) > 50) {
            return response()->json(['message' => 'Fill in the form correctly'], 401);
        }


        $updatedLink = Link::where("id", $request->id)->first();
        $updatedLink->contents = $request->contents;
        $updatedLink->title = $request->title;


        if (filter_var($request->contents, FILTER_VALIDATE_URL) === FALSE) {
            return response()->json(['message' => 'Invalid link'],401);
        } else {
            $updatedLink->save();
        }
    }

};
