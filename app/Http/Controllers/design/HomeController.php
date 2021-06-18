<?php

namespace App\Http\Controllers\design;

use App\Color;
use App\Slider;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('design.index');
    }

    // public function product_detials($id) {
    //     return view();
    // }
}
