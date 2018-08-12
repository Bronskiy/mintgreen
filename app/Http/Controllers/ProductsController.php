<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductBlocks;

class ProductsController extends Controller
{

  public function getProductsData()
  {
    return view('pages.home');
  }

  public function getProductCaddy()
  {
    $data['ProductData'] = Product::with('productblocks')->first();
    return view('pages.productDetail',$data);
  }
}
