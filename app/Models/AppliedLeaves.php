<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedLeaves extends Model
{
    use HasFactory;
    protected $fillable = [
      'leave_id',
      'start_date',
      'end_date',
      'reason',
      'reporting_o',
      'user_id',
      'department_id',
      'status',
    ];
    public function storeLeave($data)
    {
      return AppliedLeaves::create($data);
    }
    public function leaveName()
    {
      return $this->hasOne(LeaveTypes::class,'id','leave_id');
    }
    public function multusers()
    {
      return $this->hasOne(User::class,'id','user_id');
    }
    public function dept()
    {
      return $this->hasOne(Department::class,'id','department_id');
    }
    public function leaveStat()
    {
      return $this->belongsTo(LeaveStatus::class,'id','applied_id');
    }
}
