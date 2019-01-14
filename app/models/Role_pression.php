<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role_pression extends Model
{
    //
    public $table='role_pression';

    //查询权限
    public function get_pre( $id ){
        return  role_pression::select()->where(['role_id'=> $id ])->get()->toArray();
    }
}
