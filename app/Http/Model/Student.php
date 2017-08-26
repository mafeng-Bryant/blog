<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $table = 'student';

    protected  $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name','age'];

    protected  $guarded = [];

    //
}
