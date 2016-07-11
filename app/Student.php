<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table= 'students';
    protected $fillable=['id','name','email','phone','birth_year'];
}
