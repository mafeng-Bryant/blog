<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/10/19
 * Time: 15:41
 */

namespace App\Http\Controllers\View;

use App\Entity\Category;
use App\Entity\Product;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Log;

class BookController extends ApiController
{
    public function toCategory($value='')
    {
       Log::info("进入书籍类别");
       $categorys = Category::whereNull('parent_id')->get();
       return view('category')->with('categorys',$categorys);
    }

    public function toProduct($category_id)
    {
      $products = Product::Where('category_id',$category_id)->get();
      return view('product')->with('products',$products);
    }

    public function toProductContent($product_id)
    {
        $products = Product::find($product_id);
        return view('pdf_content')->with('products',$products);
    }




}
