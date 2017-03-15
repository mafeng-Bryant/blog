
@extends('layouts.home')

@section('info')

    <title>{{$field->article_name}} - {{Config::get('web.web_site')}}</title>
    <meta name="keywords" content="{{$field->article_tag}}" />
    <meta name="description" content="{{$field->article_description}}" />

@endsection

@section('content')

<article class="blogs">
    <h1 class="t_nav"><span>您当前的位置：<a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a href="{{url('cate/'.$field->category_id)}}">{{$field->category_name}}</a></span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$field->category_id)}}" class="n2">{{$field->category_name}}</a></h1>
    <div class="index_about">
        <h2 class="c_titile">{{$field->article_title}}</h2>
        <p class="box_c"><span class="d_time">发布时间：{{date('Y-m-d',$field->article_time)}}</span><span>编辑：{{$field->article_editor}}</span><span>查看次数：{{$field->article_view}}</span></p>
        <ul class="infos">
            {!! $field->article_content !!}
        </ul>
        <div class="keybq">
            <p><span>关键字词</span>：{{$field->article_tag}}</p>
        </div>
        <div class="ad"> </div>
        <div class="nextinfo">
            <p>上一篇：
                @if($article['pre'])
                <a href="{{url('a/'.$article['pre']->article_id)}}">{{$article['pre']->article_title}}</a>
                 @else
                <span>没有上一篇了!</span>
                 @endif
            </p>
            <p>下一篇：
                @if($article['next'])
                    <a href="{{url('a/'.$article['next']->article_id)}}">{{$article['next']->article_title}}</a>
                @else
                    <span>没有下一篇了!</span>
                @endif
            </p>
        </div>
        <div class="otherlink">
            <h2>相关文章</h2>
            <ul>
                <li><a href="/news/s/2013-07-25/524.html" title="现在，我相信爱情！">现在，我相信爱情！</a></li>
                <li><a href="/newstalk/mood/2013-07-24/518.html" title="我希望我的爱情是这样的">我希望我的爱情是这样的</a></li>
                <li><a href="/newstalk/mood/2013-07-02/335.html" title="有种情谊，不是爱情，也算不得友情">有种情谊，不是爱情，也算不得友情</a></li>
                <li><a href="/newstalk/mood/2013-07-01/329.html" title="世上最美好的爱情">世上最美好的爱情</a></li>
                <li><a href="/news/read/2013-06-11/213.html" title="爱情没有永远，地老天荒也走不完">爱情没有永远，地老天荒也走不完</a></li>
                <li><a href="/news/s/2013-06-06/24.html" title="爱情的背叛者">爱情的背叛者</a></li>
            </ul>
        </div>
    </div>
    <aside class="right">
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <!-- Baidu Button END -->
        <div class="blank"></div>
        <div class="news">
            <h3>
                <p>栏目<span>最新</span></p>
            </h3>
            <ul class="rank">
                <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
                <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
                <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
                <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
                <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
                <li><a href="/" title="建站流程篇——教你如何快速学会做网站" target="_blank">建站流程篇——教你如何快速学会做网站</a></li>
                <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
                <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
            </ul>
            <h3 class="ph">
                <p>点击<span>排行</span></p>
            </h3>
            <ul class="paih">
                <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
                <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
                <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
                <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
                <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
            </ul>
        </div>
        <div class="visitors">
            <h3>
                <p>最近访客</p>
            </h3>
            <ul>
            </ul>
        </div>
    </aside>


@endsection
