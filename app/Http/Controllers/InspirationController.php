<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;
use App\Project;

class InspirationController extends Controller
{
    public function create(Request $request, $image_info){

      //   $project = Project::where('id', $id)->first();
      //
      // return $project;
      $project_id = Project::orderBy('id', 'desc')->first();


      $saveData = [
        "image_info"=> $image_info,
        "image_url"=> $request->image_url,
        "project_id"=> $project_id->id
      ];
      $image = Image::create($saveData);
      return back();
    }

    public function destroy($image_info){
      $image = Image::where('image_info', $image_info);
      $image->delete();
      return back();
    }
}
