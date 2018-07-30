<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Subscribers;
use App\Http\Requests\CreateSubscribersRequest;
use App\Http\Requests\UpdateSubscribersRequest;
use Illuminate\Http\Request;



class SubscribersController extends Controller {

	/**
	 * Display a listing of subscribers
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $subscribers = Subscribers::all();

		return view('admin.subscribers.index', compact('subscribers'));
	}

	/**
	 * Show the form for creating a new subscribers
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.subscribers.create');
	}

	/**
	 * Store a newly created subscribers in storage.
	 *
     * @param CreateSubscribersRequest|Request $request
	 */
	public function store(CreateSubscribersRequest $request)
	{
	    
		Subscribers::create($request->all());

		return redirect()->route(config('quickadmin.route').'.subscribers.index');
	}

	/**
	 * Show the form for editing the specified subscribers.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$subscribers = Subscribers::find($id);
	    
	    
		return view('admin.subscribers.edit', compact('subscribers'));
	}

	/**
	 * Update the specified subscribers in storage.
     * @param UpdateSubscribersRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSubscribersRequest $request)
	{
		$subscribers = Subscribers::findOrFail($id);

        

		$subscribers->update($request->all());

		return redirect()->route(config('quickadmin.route').'.subscribers.index');
	}

	/**
	 * Remove the specified subscribers from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Subscribers::destroy($id);

		return redirect()->route(config('quickadmin.route').'.subscribers.index');
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
            Subscribers::destroy($toDelete);
        } else {
            Subscribers::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.subscribers.index');
    }

}
