<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamCategory;
use App\TeamMembers;
use App\TeamPage;

class TeamController extends Controller
{
  public function getTeamData()
  {
    $data['TeamPage'] = TeamPage::all();
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
