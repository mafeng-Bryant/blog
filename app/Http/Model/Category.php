<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/2/25
 * Time: 07:40
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected  $table = 'blog_category';
   protected $primaryKey = 'category_id';
   public  $timestamps = false;
   protected $guarded = [];
}