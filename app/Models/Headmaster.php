<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Headmaster extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function schoolList(){
        return $this->hasOne(School::class,'id','schoolId');
    }
     public function Staff(){
        return $this->hasMany(Staff::class,'schoolId','schoolId');
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
