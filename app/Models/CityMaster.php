<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityMaster extends Model
{
    use HasFactory;
    protected $table = "city_master";

    protected $fillable = ['id','city','state_id'];

    public function SatatMaster()
    {
        return $this->belongsTo('App\SatatMaster','id');
    }
}
