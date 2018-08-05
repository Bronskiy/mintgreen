<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class AddressController extends Controller
{
/*
  public function getCountriesList()
  {
    $countries = World::Countries()->orderBy('name', 'asc');
    //return view('includes.requestModal',compact('countries'));
    return response()->json($countries);
  }
*/
  public function getStateList(Request $request)
  {
    //$country = Country::getByCode($request->country_code);
    //$provinces = $country->divisions()->get();
    $provinces = Countries::where('name.common', $request->country_name)
        ->first()
        ->hydrateStates()
        ->states
        ->sortBy('name')
        ->pluck('name', 'postal');
    return response()->json($provinces);
  }
  public function getCityList(Request $request)
  {
    //$country = Country::getByCode($request->country_code);

    //$country->has_division; // true, otherwise is false
    //$regsions = $country->children();

    $city = Countries::where('name.common', $request->country_name)
        ->first()
        ->hydrateCities()
        ->cities
        ->where('adm1name', $request->state_name)
        ->pluck('name');


    return response()->json($city);
  }
}
