<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private $pagePath = "frontend.pages.";

    public function index()
    {
        return view($this->pagePath.'home.home');
    }
}
