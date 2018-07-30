<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\TeamCategory;
use App\Http\Requests\CreateTeamCategoryRequest;
use App\Http\Requests\UpdateTeamCategoryRequest;
use Illuminate\Http\Request;



class TeamCategoryController extends Controller {

	/**
	 * Display a listing of teamcategory
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $teamcategory = TeamCategory::all();

		return view('admin.teamcategory.index', compact('teamcategory'));
	}

	/**
	 * Show the form for creating a new teamcategory
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.teamcategory.create');
	}

	/**
	 * Store a newly created teamcategory in storage.
	 *
     * @param CreateTeamCategoryRequest|Request $request
	 */
	public function store(CreateTeamCategoryRequest $request)
	{
	    
		TeamCategory::create($request->all());

		return redirect()->route(config('quickadmin.route').'.teamcategory.index');
	}

	/**
	 * Show the form for editing the specified teamcategory.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$teamcategory = TeamCategory::find($id);
	    
	    
		return view('admin.teamcategory.edit', compact('teamcategory'));
	}

	/**
	 * Update the specified teamcategory in storage.
     * @param UpdateTeamCategoryRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTeamCategoryRequest $request)
	{
		$teamcategory = TeamCategory::findOrFail($id);

        

		$teamcategory->update($request->all());

		return redirect()->route(config('quickadmin.route').'.teamcategory.index');
	}

	/**
	 * Remove the specified teamcategory from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		TeamCategory::destroy($id);

		return redirect()->route(config('quickadmin.route').'.teamcategory.index');
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
            TeamCategory::destroy($toDelete);
        } else {
            TeamCategory::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.teamcategory.index');
    }

}
