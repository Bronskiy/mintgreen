<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\About;
use App\Invest;
use App\ Specialization;

class OnePageController extends Controller
{
  public function getHome()
  {
    $data['HomeData'] = Home::all();
    return view('pages.home',$data);
  }

  public function getAbout()
  {
    $data['AboutData'] = About::all();
    $data['SpecializationData'] = Specialization::orderBy('specialization_order', 'asc')->get();
    return view('pages.about',$data);
  }

  public function getThankYou()
  {
    return view('pages.thankYou');
  }

  public function getInvest()
  {
    $data['InvestData'] = Invest::all();
    return view('pages.invest',$data);
  }
}
