<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $guarded = [];  
    public function department()
    {
    	return $this->belongsTo(Department::class,'department_id');
    }
    public function subdepartment()
    {
    	return $this->belongsTo(SubDepartment::class,'sub_department_id');
    }
    public function accesslevel()
    {
    	return $this->belongsTo(AccessLevel::class,'access_level_id');
    }
}
