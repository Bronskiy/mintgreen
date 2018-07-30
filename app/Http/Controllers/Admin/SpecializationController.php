<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Specialization;
use App\Http\Requests\CreateSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class SpecializationController extends Controller {

	/**
	 * Display a listing of specialization
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $specialization = Specialization::all();

		return view('admin.specialization.index', compact('specialization'));
	}

	/**
	 * Show the form for creating a new specialization
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.specialization.create');
	}

	/**
	 * Store a newly created specialization in storage.
	 *
     * @param CreateSpecializationRequest|Request $request
	 */
	public function store(CreateSpecializationRequest $request)
	{
	    $request = $this->saveFiles($request);
		Specialization::create($request->all());

		return redirect()->route(config('quickadmin.route').'.specialization.index');
	}

	/**
	 * Show the form for editing the specified specialization.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$specialization = Specialization::find($id);
	    
	    
		return view('admin.specialization.edit', compact('specialization'));
	}

	/**
	 * Update the specified specialization in storage.
     * @param UpdateSpecializationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSpecializationRequest $request)
	{
		$specialization = Specialization::findOrFail($id);

        $request = $this->saveFiles($request);

		$specialization->update($request->all());

		return redirect()->route(config('quickadmin.route').'.specialization.index');
	}

	/**
	 * Remove the specified specialization from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Specialization::destroy($id);

		return redirect()->route(config('quickadmin.route').'.specialization.index');
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
            Specialization::destroy($toDelete);
        } else {
            Specialization::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.specialization.index');
    }

}
