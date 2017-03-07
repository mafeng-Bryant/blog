<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected  $table = 'blog_config';
    protected $primaryKey = 'config_id';
    public  $timestamps = false;
    protected $guarded = [];

}
