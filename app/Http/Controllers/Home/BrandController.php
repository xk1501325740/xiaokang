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
    public function brand_list()
    {
        return view('home.Brand_List');
    }
    public function category()
    {
        return view('home.Category');
    }
    public function category_list()
    {
        return view('home.Category_List');
    }







}
