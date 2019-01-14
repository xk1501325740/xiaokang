<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    //
    public $table='admin_role';

    //查询角色id
    public function get_role( $id ){
      return  admin_role::select()->where(['admin_id'=> $id ])->get()->toArray();
    }
}
