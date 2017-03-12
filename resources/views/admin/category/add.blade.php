@extends('layouts.admin')

      @section('content')

           <div class="crumb_warp">
               <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
               <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类管理
           </div>
           <!--面包屑导航 结束-->

           <!--结果集标题与导航组件 开始-->
           <div class="result_wrap">
               <div class="result_title">
                   <h3>添加分类</h3>
                   @if(count($errors)>0)
                       <div class="mark">
                           @if(is_object($errors))
                               @foreach($errors->all() as $error)
                                   <p>{{$error}}</p>
                               @endforeach
                           @else
                               <p>{{$errors}}</p>
                           @endif
                       </div>
                   @endif
               </div>
               <div class="result_content">
                   <div class="short_wrap">
                       <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>
                       <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分类</a>
                   </div>
               </div>
           </div>
           <!--结果集标题与导航组件 结束-->

           <div class="result_wrap">
               <form action="{{url('admin/category')}}" method="post">
                   {{csrf_field()}}
                   <table class="add_tab">
                       <tbody>

                       <tr>
                           <th><i class="require">*</i>分类名称：</th>
                           <td>
                               <input type="text" name="category_name">
                               <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                           </td>
                       </tr>


                       <tr>
                           <th><i class="require"></i>分类标题：</th>
                           <td>
                               <input type="text" class="lg" name="category_title">
                           </td>
                       </tr>

                       <tr>
                           <th>关键词：</th>
                           <td>
                               <textarea name="category_keywords"></textarea>
                           </td>
                       </tr>

                       <tr>
                           <th>描述：</th>
                           <td>
                               <textarea name="category_description"></textarea>
                           </td>
                       </tr>


                       <tr>
                           <th><i class="require">*</i>排序：</th>
                           <td>
                               <input type="text" class="sm" name="category_order">
                               <span><i class="fa fa-exclamation-circle yellow"></i></span>
                           </td>
                       </tr>

                       <tr>
                           <th></th>
                           <td>
                               <input type="submit" value="提交">
                               <input type="button" class="back" onclick="history.go(-1)" value="返回">
                           </td>
                       </tr>
                       </tbody>
                   </table>
               </form>
           </div>

       @endsection
