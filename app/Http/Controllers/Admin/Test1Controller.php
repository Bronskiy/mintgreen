<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Test1;
use App\Http\Requests\CreateTest1Request;
use App\Http\Requests\UpdateTest1Request;
use Illuminate\Http\Request;



class Test1Controller extends Controller {

	/**
	 * Display a listing of test1
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $test1 = Test1::all();

		return view('admin.test1.index', compact('test1'));
	}

	/**
	 * Show the form for creating a new test1
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.test1.create');
	}

	/**
	 * Store a newly created test1 in storage.
	 *
     * @param CreateTest1Request|Request $request
	 */
	public function store(CreateTest1Request $request)
	{
	    
		Test1::create($request->all());

		return redirect()->route(config('quickadmin.route').'.test1.index');
	}

	/**
	 * Show the form for editing the specified test1.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$test1 = Test1::find($id);
	    
	    
		return view('admin.test1.edit', compact('test1'));
	}

	/**
	 * Update the specified test1 in storage.
     * @param UpdateTest1Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTest1Request $request)
	{
		$test1 = Test1::findOrFail($id);

        

		$test1->update($request->all());

		return redirect()->route(config('quickadmin.route').'.test1.index');
	}

	/**
	 * Remove the specified test1 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Test1::destroy($id);

		return redirect()->route(config('quickadmin.route').'.test1.index');
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
            Test1::destroy($toDelete);
        } else {
            Test1::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.test1.index');
    }

}
