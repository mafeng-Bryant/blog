<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/8/24
 * Time: 08:22
 */

namespace App\Http\Controllers;

use App\Http\Model\Student;
use App\Jobs\SendMaEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller {

    public  function  info()
    {
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

    /**
     *
     */
    public function  orm1()
    {
//        $datas = Student::all();
//        $result = Student::find(4);
//        $result2 = Student::findOrFail(43);
//        $result3 = Student::get();
//        dd($result3);
        echo "<pre>";
       Student::chunk(2,function($students){
           var_dump($students);
       });
    }

    /**
     *
     */
    public function orm2()
    {
//        $student->name = 'ma';
//        $student->age = 12;
//        $student->save();
//        $student = DB::SELECT(//        $student =  new Student();
//        dd($student);
//        $student = Student::find(4);
//        echo $student->create_at;
//        echo date('Y-m-d H:i:s',$student->create_at);

        Student::create(['name'=>'pp','age'=>100]);
        dd(Student::all());

    }

    public function orm3()
    {
//     $student = Student::find(20);
//     $bool = $student->delete();
//       $datas = Student::all();
//       var_dump($datas);
//        $result = Student::destroy([10,11,12,13,14,15]);
//        dd($result);

        return view('welcome');
     }

     public function urlTest()
     {
        return "urlTest";

     }

     public function request1(Request $request)
     {
//        echo $request->input('name');

        $bool =  $request->ajax();
         var_dump($bool);
//         $info = $request->all();
//         dd($info);
     }

     public function  cache1()
     {
       Cache::put('key1','val1',10);
     }

     public function  cache2()
     {

         if (Cache::has('key1')) {
             $val = Cache::get('key1');
             var_dump($val);
             $result = Cache::pull('key1');
             var_dump($result);

             $student = null;
             if ($student == null) {
                 abort('503');

             }

             return view('student.error');
         }

     }

     public  function error()
     {
         Log::info('这是一个info级别的日志');
         Log::warning('这是一个warning级别的日志');
         Log::error('这是一个error级别的日志',['name'=>'mafeng','age'=>121]);
     }

     public function  queue(){

       $this->dispatch(new SendMaEmail('631383987@qq.com'));

     }

     public function mail(){


//       Mail::raw('邮件内容',function ($message){
//          $message->from('1499603656@qq.com','小猪');
//          $message->subject('猪猪');
//          $message->to('673103316@qq.com');
//       });

       Mail::send('mail.mail',['name'=>'小猪'],function ($message){
           $message->to('631383987@qq.com');
       });

     }


}