<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class admin extends Model
{
    //
    public $table='admin';

    //登陆
    public function login($name,$pwd){
        return DB::table('admin')->where([
            ['username', '=', $name],
            ['password', '=', $pwd],
        ])->get();
    }
}
