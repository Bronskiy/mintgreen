<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamCategory;
use App\TeamMembers;

class TeamController extends Controller
{
  public function getTeamData()
  {
    $categories = TeamCategory::get();
    foreach ($categories as $category) {
      $data['Category'][] = $category;
      $data['TeamData'][] = TeamMembers::whereHas('teamcategory', function($q) use($category){
        $q->where('teamcategory_id', '=', $category['id']);
      })->get();
    }
    return view('pages.team',$data);
  }
}
