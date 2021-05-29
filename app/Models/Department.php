<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Department extends Model
{
    use HasFactory;
    protected $fillable = [
      'department_name',
      'designation',
      'department_head_id',
    ];
    public function depthead()
    {
      return $this->hasOne(User::class,'id','department_head_id');
    }
}
