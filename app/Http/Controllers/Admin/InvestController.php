<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Invest;
use App\Http\Requests\CreateInvestRequest;
use App\Http\Requests\UpdateInvestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class InvestController extends Controller {

	/**
	 * Display a listing of invest
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $invest = Invest::all();

		return view('admin.invest.index', compact('invest'));
	}

	/**
	 * Show the form for creating a new invest
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.invest.create');
	}

	/**
	 * Store a newly created invest in storage.
	 *
     * @param CreateInvestRequest|Request $request
	 */
	public function store(CreateInvestRequest $request)
	{
	    $request = $this->saveFiles($request);
		Invest::create($request->all());

		return redirect()->route(config('quickadmin.route').'.invest.index');
	}

	/**
	 * Show the form for editing the specified invest.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$invest = Invest::find($id);
	    
	    
		return view('admin.invest.edit', compact('invest'));
	}

	/**
	 * Update the specified invest in storage.
     * @param UpdateInvestRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateInvestRequest $request)
	{
		$invest = Invest::findOrFail($id);

        $request = $this->saveFiles($request);

		$invest->update($request->all());

		return redirect()->route(config('quickadmin.route').'.invest.index');
	}

	/**
	 * Remove the specified invest from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Invest::destroy($id);

		return redirect()->route(config('quickadmin.route').'.invest.index');
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
            Invest::destroy($toDelete);
        } else {
            Invest::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.invest.index');
    }

}
