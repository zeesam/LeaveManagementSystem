<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
      'department_id',
      'mobile',
      'id_number',
      'designation',
      'user_id',
    ];
    public function users()
    {
      return $this->hasOne(User::class,'id','user_id');
    }

}
