<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name'
    ];
    public function user(){
        return $this->hasMany('App\Models\User','department_id','id');// duong dan, khoa ngoai, khoa chinh
    }
}
