<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ProductBlocks;
use App\Http\Requests\CreateProductBlocksRequest;
use App\Http\Requests\UpdateProductBlocksRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ProductBlocksController extends Controller {

	/**
	 * Display a listing of productblocks
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $productblocks = ProductBlocks::all();

		return view('admin.productblocks.index', compact('productblocks'));
	}

	/**
	 * Show the form for creating a new productblocks
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.productblocks.create');
	}

	/**
	 * Store a newly created productblocks in storage.
	 *
     * @param CreateProductBlocksRequest|Request $request
	 */
	public function store(CreateProductBlocksRequest $request)
	{
	    $request = $this->saveFiles($request);
		ProductBlocks::create($request->all());

		return redirect()->route(config('quickadmin.route').'.productblocks.index');
	}

	/**
	 * Show the form for editing the specified productblocks.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$productblocks = ProductBlocks::find($id);
	    
	    
		return view('admin.productblocks.edit', compact('productblocks'));
	}

	/**
	 * Update the specified productblocks in storage.
     * @param UpdateProductBlocksRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateProductBlocksRequest $request)
	{
		$productblocks = ProductBlocks::findOrFail($id);

        $request = $this->saveFiles($request);

		$productblocks->update($request->all());

		return redirect()->route(config('quickadmin.route').'.productblocks.index');
	}

	/**
	 * Remove the specified productblocks from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ProductBlocks::destroy($id);

		return redirect()->route(config('quickadmin.route').'.productblocks.index');
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
            ProductBlocks::destroy($toDelete);
        } else {
            ProductBlocks::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.productblocks.index');
    }

}
