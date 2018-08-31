<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CustomCSS;
use App\Http\Requests\CreateCustomCSSRequest;
use App\Http\Requests\UpdateCustomCSSRequest;
use Illuminate\Http\Request;



class CustomCSSController extends Controller {

	/**
	 * Display a listing of customcss
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $customcss = CustomCSS::all();

		return view('admin.customcss.index', compact('customcss'));
	}

	/**
	 * Show the form for creating a new customcss
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.customcss.create');
	}

	/**
	 * Store a newly created customcss in storage.
	 *
     * @param CreateCustomCSSRequest|Request $request
	 */
	public function store(CreateCustomCSSRequest $request)
	{
	    
		CustomCSS::create($request->all());

		return redirect()->route(config('quickadmin.route').'.customcss.index');
	}

	/**
	 * Show the form for editing the specified customcss.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$customcss = CustomCSS::find($id);
	    
	    
		return view('admin.customcss.edit', compact('customcss'));
	}

	/**
	 * Update the specified customcss in storage.
     * @param UpdateCustomCSSRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCustomCSSRequest $request)
	{
		$customcss = CustomCSS::findOrFail($id);

        

		$customcss->update($request->all());

		return redirect()->route(config('quickadmin.route').'.customcss.index');
	}

	/**
	 * Remove the specified customcss from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CustomCSS::destroy($id);

		return redirect()->route(config('quickadmin.route').'.customcss.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            CustomCSS::destroy($toDelete);
        } else {
            CustomCSS::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.customcss.index');
    }

}
