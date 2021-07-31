<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['department_id','first_name','last_name', 'position','salary','gender','status','blood_group','image_path'];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
