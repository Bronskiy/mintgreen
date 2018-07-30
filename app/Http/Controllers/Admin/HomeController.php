<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Home;
use App\Http\Requests\CreateHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class HomeController extends Controller {

	/**
	 * Display a listing of home
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $home = Home::all();

		return view('admin.home.index', compact('home'));
	}

	/**
	 * Show the form for creating a new home
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.home.create');
	}

	/**
	 * Store a newly created home in storage.
	 *
     * @param CreateHomeRequest|Request $request
	 */
	public function store(CreateHomeRequest $request)
	{
	    $request = $this->saveFiles($request);
		Home::create($request->all());

		return redirect()->route(config('quickadmin.route').'.home.index');
	}

	/**
	 * Show the form for editing the specified home.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$home = Home::find($id);
	    
	    
		return view('admin.home.edit', compact('home'));
	}

	/**
	 * Update the specified home in storage.
     * @param UpdateHomeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHomeRequest $request)
	{
		$home = Home::findOrFail($id);

        $request = $this->saveFiles($request);

		$home->update($request->all());

		return redirect()->route(config('quickadmin.route').'.home.index');
	}

	/**
	 * Remove the specified home from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Home::destroy($id);

		return redirect()->route(config('quickadmin.route').'.home.index');
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
            Home::destroy($toDelete);
        } else {
            Home::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.home.index');
    }

}
