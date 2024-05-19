<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ApplicationController extends Controller
{
    private $pagePath = "frontend.pages.";

    public function index()
    {
        $data['productsData']=Product::all();
        return view($this->pagePath.'home.home',$data);
    }

    public function productDetails($slug)
    {
        $data['product']=Product::where('slug',$slug)->first();
        return view($this->pagePath.'product.product-details',$data);
    }
}
