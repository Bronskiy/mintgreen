<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CommonData;
use App\Http\Requests\CreateCommonDataRequest;
use App\Http\Requests\UpdateCommonDataRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;



class CommonDataController extends Controller {

	/**
	 * Display a listing of commondata
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $commondata = CommonData::all();

		return view('admin.commondata.index', compact('commondata'));
	}

	/**
	 * Show the form for creating a new commondata
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{


	    return view('admin.commondata.create');
	}

	/**
	 * Store a newly created commondata in storage.
	 *
     * @param CreateCommonDataRequest|Request $request
	 */
	public function store(CreateCommonDataRequest $request)
	{

		$request = $this->saveFiles($request);
		CommonData::create($request->all());

		return redirect()->route(config('quickadmin.route').'.commondata.index');
	}

	/**
	 * Show the form for editing the specified commondata.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$commondata = CommonData::find($id);


		return view('admin.commondata.edit', compact('commondata'));
	}

	/**
	 * Update the specified commondata in storage.
     * @param UpdateCommonDataRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCommonDataRequest $request)
	{
		$commondata = CommonData::findOrFail($id);
		$request = $this->saveFiles($request);
        

		$commondata->update($request->all());

		return redirect()->route(config('quickadmin.route').'.commondata.index');
	}

	/**
	 * Remove the specified commondata from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CommonData::destroy($id);

		return redirect()->route(config('quickadmin.route').'.commondata.index');
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
            CommonData::destroy($toDelete);
        } else {
            CommonData::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.commondata.index');
    }

}
