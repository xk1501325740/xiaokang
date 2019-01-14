<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function brand()
    {
        return view('home.brand');
    }
    public function brandlist()
    {
        return view('home.brand_list');
    }
}
