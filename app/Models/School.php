<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    public function stateList(){
        return $this->hasOne(State::class,'state_id','state');
    }
    public function districtList(){
        return $this->hasOne(District::class,'districtid','district');
    }
    public function blockList(){
        return $this->hasOne(Block::class,'id','block');
    }
}
