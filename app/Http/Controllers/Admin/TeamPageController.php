<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\TeamPage;
use App\Http\Requests\CreateTeamPageRequest;
use App\Http\Requests\UpdateTeamPageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class TeamPageController extends Controller {

	/**
	 * Display a listing of teampage
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $teampage = TeamPage::all();

		return view('admin.teampage.index', compact('teampage'));
	}

	/**
	 * Show the form for creating a new teampage
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.teampage.create');
	}

	/**
	 * Store a newly created teampage in storage.
	 *
     * @param CreateTeamPageRequest|Request $request
	 */
	public function store(CreateTeamPageRequest $request)
	{
	    $request = $this->saveFiles($request);
		TeamPage::create($request->all());

		return redirect()->route(config('quickadmin.route').'.teampage.index');
	}

	/**
	 * Show the form for editing the specified teampage.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$teampage = TeamPage::find($id);
	    
	    
		return view('admin.teampage.edit', compact('teampage'));
	}

	/**
	 * Update the specified teampage in storage.
     * @param UpdateTeamPageRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTeamPageRequest $request)
	{
		$teampage = TeamPage::findOrFail($id);

        $request = $this->saveFiles($request);

		$teampage->update($request->all());

		return redirect()->route(config('quickadmin.route').'.teampage.index');
	}

	/**
	 * Remove the specified teampage from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		TeamPage::destroy($id);

		return redirect()->route(config('quickadmin.route').'.teampage.index');
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
            TeamPage::destroy($toDelete);
        } else {
            TeamPage::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.teampage.index');
    }

}
