<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ThankYou;
use App\Http\Requests\CreateThankYouRequest;
use App\Http\Requests\UpdateThankYouRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ThankYouController extends Controller {

	/**
	 * Display a listing of thankyou
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $thankyou = ThankYou::all();

		return view('admin.thankyou.index', compact('thankyou'));
	}

	/**
	 * Show the form for creating a new thankyou
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.thankyou.create');
	}

	/**
	 * Store a newly created thankyou in storage.
	 *
     * @param CreateThankYouRequest|Request $request
	 */
	public function store(CreateThankYouRequest $request)
	{
	    $request = $this->saveFiles($request);
		ThankYou::create($request->all());

		return redirect()->route(config('quickadmin.route').'.thankyou.index');
	}

	/**
	 * Show the form for editing the specified thankyou.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$thankyou = ThankYou::find($id);
	    
	    
		return view('admin.thankyou.edit', compact('thankyou'));
	}

	/**
	 * Update the specified thankyou in storage.
     * @param UpdateThankYouRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateThankYouRequest $request)
	{
		$thankyou = ThankYou::findOrFail($id);

        $request = $this->saveFiles($request);

		$thankyou->update($request->all());

		return redirect()->route(config('quickadmin.route').'.thankyou.index');
	}

	/**
	 * Remove the specified thankyou from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ThankYou::destroy($id);

		return redirect()->route(config('quickadmin.route').'.thankyou.index');
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
            ThankYou::destroy($toDelete);
        } else {
            ThankYou::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.thankyou.index');
    }

}
