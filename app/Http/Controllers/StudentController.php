<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/8/24
 * Time: 08:22
 */

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller {

    public  function  info(){


//        $id = DB::table('student')->insertGetId(['name'=>'wangwu','age'=>102]);
//        dd($id);

//      DB::table('student')->insert(['name'=>'zhangshan','age'=>12]);
//
//
//     $datas =  DB::table('student')
//             ->select('name')
//         ->addSelect(DB::raw('count(*) as user_count'))
//         ->addSelect(DB::raw("0 as type"))
//             ->get();
//      dd($datas);


//       $count =  DB::table('student')->count();
//       dd($count);
//       $datas =  DB::table('student')->lists('id','age');
//       dd($datas);

//        DB::table('student')
//            ->where('id','=',4)
//            ->update(['age'=>100]);

          DB::table('student')
              ->where('id','=',4)
               ->decrement('age',5,['name'=>'shazi']);

        $student = DB::SELECT('select * from student');
        dd($student);
    }

    public function query3(){

      DB::table('student')
         ->where('age','>',18)
         ->delete();
        $student = DB::SELECT('select * from student');
        dd($student);
    }

    public function  query2()
    {
//      $num = DB::table('student')
//            ->where('id','=',4)
//            ->update(['age'=>100]);
//      var_dump($num);
        //DB::table('student')->increment('age',100);

//       $students = DB::table('student')
//             ->pluck('name','id');
//
//       dd($students);

        //一次性查询的数据个数
        echo '<pre>';
        DB::table('student')->chunk(2,function($students){
            var_dump($students);
            return false;
        });
        $student = DB::SELECT('select * from student');
        dd($student);

    }

    public function  orm1()
    {

      $datas = Student::all();
      dd($datas);

    }

}