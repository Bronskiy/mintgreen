<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Requests;
use App\Http\Requests\CreateRequestsRequest;
use App\Http\Requests\UpdateRequestsRequest;
use Illuminate\Http\Request;

use App\Product;


class RequestsController extends Controller {

	/**
	 * Display a listing of requests
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $requests = Requests::with("product")->get();

		return view('admin.requests.index', compact('requests'));
	}

	/**
	 * Show the form for creating a new requests
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $product = Product::pluck("product_title", "id")->prepend('Please select', 0);

	    
	    return view('admin.requests.create', compact("product"));
	}

	/**
	 * Store a newly created requests in storage.
	 *
     * @param CreateRequestsRequest|Request $request
	 */
	public function store(CreateRequestsRequest $request)
	{
	    
		Requests::create($request->all());

		return redirect()->route(config('quickadmin.route').'.requests.index');
	}

	/**
	 * Show the form for editing the specified requests.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$requests = Requests::find($id);
	    $product = Product::pluck("product_title", "id")->prepend('Please select', 0);

	    
		return view('admin.requests.edit', compact('requests', "product"));
	}

	/**
	 * Update the specified requests in storage.
     * @param UpdateRequestsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRequestsRequest $request)
	{
		$requests = Requests::findOrFail($id);

        

		$requests->update($request->all());

		return redirect()->route(config('quickadmin.route').'.requests.index');
	}

	/**
	 * Remove the specified requests from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Requests::destroy($id);

		return redirect()->route(config('quickadmin.route').'.requests.index');
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
            Requests::destroy($toDelete);
        } else {
            Requests::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.requests.index');
    }

}
