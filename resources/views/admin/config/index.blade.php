@extends('layouts.admin')
       @section('content')

           <div class="crumb_warp">
               <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
               <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  配置项管理
           </div>
           <!--面包屑导航 结束-->


           <!--搜索结果页面 列表 开始-->
           <form action="#" method="post">
               <div class="result_wrap">
                   <div class="result_title">
                       <h3>添加配置项</h3>
                   </div>
                   <!--快捷导航 开始-->
                   <div class="result_content">
                       <div class="short_wrap">
                           <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a>
                           <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部配置项</a>
                       </div>
                   </div>
                   <!--快捷导航 结束-->
               </div>


               <div class="result_wrap">
                   <div class="result_content">
                       <table class="list_tab">
                           <tr>
                               <th class="tc" width="5%">排序</th>
                               <th class="tc" width="5%">ID</th>
                               <th>标题</th>
                               <th>名称</th>
                               <th>内容</th>
                               <th>操作</th>
                           </tr>

             @foreach($data as $v)
                           <tr>
                               <td class="tc">
                                   <input type="text" onchange="changeOrder(this,{{$v->config_id}})" value="{{$v->config_order}}">
                               </td>

                               <td class="tc">{{$v->config_id}}</td>

                               <td>
                                   <a href="#">{{$v->config_title}}</a>
                               </td>

                               <td>{{$v->config_name}}</td>
                               <td>{!! $v->_html !!}</td>
                               <td>
                                   <a href="{{url('admin/config/'.$v->config_id.'/edit')}}">修改</a>
                                   <a href="javascript:;" onclick="deleteLinks({{$v->nav_id}})">删除</a>

                               </td>
                           </tr>
                @endforeach

                       </table>

                   </div>
               </div>
           </form>



     <script>


      function changeOrder(obj,config_id)
      {
          var config_order = $(obj).val();
          $.post("{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','config_id':config_id,'config_order':config_order},function(data){
              if(data.status == 0){
                  layer.msg(data.msg, {icon: 6});
              }else{
                  layer.msg(data.msg, {icon: 5});
              }
          });
      }

      function deleteLinks(config_id) {
          layer.confirm('您确定要删除这个友情链接吗？', {
              btn: ['确定','取消'] //按钮
          }, function(){
              $.post("{{url('admin/config/')}}/"+config_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                  if(data.status==200){
                      location.href = location.href;
                      layer.msg(data.msg, {icon: 6});
                  }else{
                      layer.msg(data.msg, {icon: 5});
                  }
              });
          }, function(){

          });
      }



     </script>

       @endsection

