<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent {

    protected $table = 'users';

/*    public function agencyInfo() {
        return $this->hasOne('AgencyInforms', 'user_id');
    }

    public function maidInforms() {
        return $this->hasMany('MaidInforms', 'supplier_id');
    }*/
}