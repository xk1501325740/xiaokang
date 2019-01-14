<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuycarController extends Controller
{
    //购物车
    public function buycar()
    {
        return view('home.buycar');
    }
    //购物车
    public function buycar_two()
    {
        return view('home.buycar_two');
    }

    //购物车
    public function buycar_three()
    {
        return view('home.buycar_three');
    }


}
