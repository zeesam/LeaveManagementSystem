<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveStatus extends Model
{
    use HasFactory;
    protected $fillable = [
      'leave_id',
      'disapprove_reason',
      'approver_name',
      'approver_designation',
      'applied_id',
      'approval_status',
    ];
}
