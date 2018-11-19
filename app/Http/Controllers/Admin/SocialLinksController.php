<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\SocialLinks;
use App\Http\Requests\CreateSocialLinksRequest;
use App\Http\Requests\UpdateSocialLinksRequest;
use Illuminate\Http\Request;



class SocialLinksController extends Controller {

	/**
	 * Display a listing of sociallinks
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $sociallinks = SocialLinks::all();

		return view('admin.sociallinks.index', compact('sociallinks'));
	}

	/**
	 * Show the form for creating a new sociallinks
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.sociallinks.create');
	}

	/**
	 * Store a newly created sociallinks in storage.
	 *
     * @param CreateSocialLinksRequest|Request $request
	 */
	public function store(CreateSocialLinksRequest $request)
	{
	    
		SocialLinks::create($request->all());

		return redirect()->route(config('quickadmin.route').'.sociallinks.index');
	}

	/**
	 * Show the form for editing the specified sociallinks.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$sociallinks = SocialLinks::find($id);
	    
	    
		return view('admin.sociallinks.edit', compact('sociallinks'));
	}

	/**
	 * Update the specified sociallinks in storage.
     * @param UpdateSocialLinksRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSocialLinksRequest $request)
	{
		$sociallinks = SocialLinks::findOrFail($id);

        

		$sociallinks->update($request->all());

		return redirect()->route(config('quickadmin.route').'.sociallinks.index');
	}

	/**
	 * Remove the specified sociallinks from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		SocialLinks::destroy($id);

		return redirect()->route(config('quickadmin.route').'.sociallinks.index');
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
            SocialLinks::destroy($toDelete);
        } else {
            SocialLinks::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.sociallinks.index');
    }

}
