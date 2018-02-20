<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Project;



class PageController extends Controller
{
    public function index(){
      $user = Auth::user();
      return view('pages/home', compact('user'));
    }

    public function search(request $request, $keyword){
      $keyword;

      $client = new Client();

      $res = $client->request('GET',
      "http://www.behance.net/v2/projects?q=".urlencode($keyword)
      ."&client_id="."HtlWSV2NyzFljVCz6Ag2hiIPCl7TvhjR"."&field=".urlencode("Web Design"));

      $data = $res->getBody();
      $data =json_decode($data);
      $filteredData = $data->projects;

      $imageArray = Project::where('user_id', Auth::id())->where('active', 1)->first();

      $imageArray = $imageArray->images;
      $imgArrayInfo = [];

      foreach($imageArray as $image) {

        array_push($imgArrayInfo, $image->image_info);
      }
  

      $user = Auth::user();
      return view('pages/results', compact('user', 'filteredData', 'keyword', 'imgArrayInfo'));
    }

    public function results(request $request){
      //http://www.behance.net/v2/projects?q=motorcyles&client_id=HtlWSV2NyzFljVCz6Ag2hiIPCl7TvhjR

      $search = $request->search;

      return redirect('search/'.urlencode($search));
    }
}
