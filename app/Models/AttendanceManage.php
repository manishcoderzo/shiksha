<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceManage extends Model
{
    use HasFactory;
    public function schoolList(){
        return $this->hasOne(School::class,'id','schoolId');
    }
     public function headmasterList(){
        return $this->hasOne(Headmaster::class,'id','headmasterId');
    }
    public function staffList(){
        return $this->hasOne(Staff::class,'id','staffId');
    }
     public function attendances(){
        return $this->hasOne(Attendance::class,'id','attendanceId');
    }
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
