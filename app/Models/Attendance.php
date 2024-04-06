<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public function schoolList(){
        return $this->hasOne(School::class,'id','schoolId');
    }
     public function headmasterList(){
        return $this->hasOne(Headmaster::class,'id','headmasterId');
    }
    public function attendanceManage(){
        return $this->hasOne(AttendanceManage::class,'attendanceId','id');
    }
    
}
