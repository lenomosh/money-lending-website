<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    protected $table = "tbl_users";
    protected $fillables =['firstName','lastName','dob','idNumber','gender','loanType','phoneNumber'];

}
