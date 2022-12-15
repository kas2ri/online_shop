<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function categoryUI(){
        
    }
    public function createUI()
    {
        return view('products.create');
    }
}
