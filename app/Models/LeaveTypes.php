<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveTypes extends Model
{
    use HasFactory;
    protected $fillable = [
      'leave_name',
      'leave_account',
      'leave_limit',
    ];
}
