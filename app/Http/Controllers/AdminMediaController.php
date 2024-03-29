<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    //
    public function index(){
        $photos = Photo::paginate(4);
        return view('admin.media.index', compact('photos'));
    }

    public function create(){

        return view('admin.media.create');
    }

    public function store(Request $request){
        $file = $request->file('file');

        $name = time() .$file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();


    }

    public function deleteMedia(Request $request){

//        if(isset($request->delete_single)){
//            $photoId = array_search('Delete', $request->delete_single);
//
//            $this->destroy($photoId);
//
//            return redirect()->back();
//        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo){
                $photo->delete();
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }
}
