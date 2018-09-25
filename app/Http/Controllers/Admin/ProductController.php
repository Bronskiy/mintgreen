<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
//use Intervention\Image\Facades\Image;
use Folklore\Image\Facades\Image;



class ProductController extends Controller {

	use FileUploadTrait;
	/**
	* Display a listing of product
	*
	* @param Request $request
	*
	* @return \Illuminate\View\View
	*/
	public function index(Request $request)
	{
		$product = Product::all();

		return view('admin.product.index', compact('product'));
	}

	/**
	* Show the form for creating a new product
	*
	* @return \Illuminate\View\View
	*/
	public function create()
	{


		return view('admin.product.create');
	}

	/**
	* Store a newly created product in storage.
	*
	* @param CreateProductRequest|Request $request
	*/
	public function store(CreateProductRequest $request)
	{
		foreach ($request->file('productblocks', []) as $index1 => $data1) {

			// product_block_image save
			$filename = time() . '-' . $data1['product_block_image']->getClientOriginalName();
			$file     = $data1['product_block_image'];
			$image    = Image::make($file);
			//Image::make($file)->resize(50, 50)->save(public_path('uploads/thumb') . '/' . $filename);
			Image::make($file,array('width' => 50,'height' => 50))->save(public_path('uploads/thumb') . '/' . $filename);
			//$width  = $image->width();
			//$height = $image->height();
			$image->save(public_path('uploads') . '/' . $filename);
			$currentProductBlocksFilesData[$index1] = $filename;

		}

		$request = $this->saveFiles($request);
		$product = Product::create($request->all());

		foreach ($request->input('product_gallery_id', []) as $index => $id) {

			$model          = config('medialibrary.media_model');
			$file           = $model::find($id);
			$file->model_id = $product->id;
			$file->save();

		}

		foreach ($request->input('productblocks', []) as $index => $data) {

			$productBlock = $product->productblocks()->create($data);
			$createdProductBlockID = $productBlock->id;
			if (isset($currentProductBlocksFilesData[$index])) {
				$product->productblocks()->where('id', $createdProductBlockID)->update(array('product_block_image' => $currentProductBlocksFilesData[$index]));
			}

		}

		return redirect()->route(config('quickadmin.route').'.product.index');
	}

	/**
	* Show the form for editing the specified product.
	*
	* @param  int  $id
	* @return \Illuminate\View\View
	*/
	public function edit($id)
	{
		$product = Product::find($id);


		return view('admin.product.edit', compact('product'));
	}

	/**
	* Update the specified product in storage.
	* @param UpdateProductRequest|Request $request
	*
	* @param  int  $id
	*/
	public function update(UpdateProductRequest $request, $id)
	{
		$request = $this->saveFiles($request);
		$product = Product::findOrFail($id);
		$product->update($request->all());

		$media = [];
		foreach ($request->input('product_gallery_id', []) as $index => $id) {
			$model          = config('medialibrary.media_model');
			$file           = $model::find($id);
			$file->model_id = $product->id;
			$file->save();
			$media[] = $file->toArray();
		}
		$product->updateMedia($media, 'product_gallery');

		$productBlocks           = $product->productblocks;
		$currentProductBlocksData = [];
		$currentProductBlocksFilesData = [];


		foreach ($request->file('productblocks', []) as $index1 => $data1) {

			// product_block_image save
			$filename = time() . '-' . $data1['product_block_image']->getClientOriginalName();
			$file     = $data1['product_block_image'];
			$image    = Image::make($file);
			//Image::make($file)->resize(50, 50)->save(public_path('uploads/thumb') . '/' . $filename);
			Image::make($file,array('width' => 50,'height' => 50))->save(public_path('uploads/thumb') . '/' . $filename);
			//$width  = $image->width();
			//$height = $image->height();
			$image->save(public_path('uploads') . '/' . $filename);

			if (is_integer($index1)) {
				$currentProductBlocksFilesTempData[$index1] = $filename;
			} else {
				$id                          = explode('-', $index1)[1];
				$currentProductBlocksFilesData[$id] = $filename;
			}

		}

		foreach ($request->input('productblocks', []) as $index => $data) {

			if (is_integer($index)) {
				$productBlock = $product->productblocks()->create($data);
				$createdProductBlockID = $productBlock->id;
				if (isset($currentProductBlocksFilesTempData[$index])) {
					$product->productblocks()->where('id', $createdProductBlockID)->update(array('product_block_image' => $currentProductBlocksFilesTempData[$index]));
				}
			} else {
				$id                          = explode('-', $index)[1];
				$currentProductBlocksData[$id] = $data;
			}
		}

		foreach ($productBlocks as $item) {
			if (isset($currentProductBlocksData[$item->id])) {
				$item->update($currentProductBlocksData[$item->id]);
				if (isset($currentProductBlocksFilesData[$item->id])) {
					$item->update(array('product_block_image' => $currentProductBlocksFilesData[$item->id]));
				}
			} else {
				$item->delete();
			}
		}

		return redirect()->route(config('quickadmin.route').'.product.index');
	}

	/**
	* Remove the specified product from storage.
	*
	* @param  int  $id
	*/
	public function destroy($id)
	{
		Product::destroy($id);

		return redirect()->route(config('quickadmin.route').'.product.index');
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
			Product::destroy($toDelete);
		} else {
			Product::whereNotNull('id')->delete();
		}

		return redirect()->route(config('quickadmin.route').'.product.index');
	}

}
