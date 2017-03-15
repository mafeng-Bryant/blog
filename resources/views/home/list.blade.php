@extends('layouts.home')

@section('info')
    <title>{{$field->category_name}} - {{Config::get('web.web_site')}}</title>
    <meta name="keywords" content="{{$field->category_keywords}}" />
    <meta name="description" content="{{$field->category_description}}" />
@endsection


@section('content')


    <article class="blogs">
    <h1 class="t_nav"><span>{{$field->category_title}}</span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$field->category_id)}}" class="n2">{{$field->category_name}}</a></h1>
    <div class="newblog left">

        @foreach($data as $d)

            <h2>{{$d->article_title}}</h2>
            <p class="dateview"><span>发布时间：{{date('Y-m-d',$d->article_time)}}</span><span>作者：{{$d->article_editor}}</span><span>分类：[<a href="{{url('cate/'.$field->category_id)}}">{{$field->category_name}}</a>]</span></p>
            <figure><img src="{{url($d->article_thumb)}}"></figure>
            <ul class="nlist">
                <p>{{url($d->article_description)}}</p>
                <a title="{{$d->article_title}}" href="{{url('a/'.$d->article_id)}}" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <div class="line"></div>

          @endforeach

        <div class="page">

            {{$data->links()}}

        </div>
    </div>
    <aside class="right">


          @if($subCategory->all())
            <div class="rnav">
                <ul>

                    @foreach($subCategory as $k=>$s)

                        <li class="rnav{{$k+1}}"><a href="{{url('cate/'.$s->category_id)}}" target="_blank">{{$s->category_name}}</a></li>

                    @endforeach

                </ul>
            </div>
        @endif

          <!-- Baidu Button BEGIN -->
              <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
              <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
              <script type="text/javascript" id="bdshell_js"></script>
              <script type="text/javascript">
                  document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
              </script>
              <!-- Baidu Button END -->

        <div class="news" style="float: left;">
           @parent
        </div>

    </aside>

@endsection