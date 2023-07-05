<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateMaster extends Model
{
    use HasFactory;
    protected $table = "state_master";

    protected $fillable = ['id','state'];

    public function CityMaster(){
        return $this->hasMany('App\CityMaster');
   }
}
