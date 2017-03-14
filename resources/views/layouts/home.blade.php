<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <link href="{{url(asset('/home/css/base.css'))}}" rel="stylesheet">
    <link href="{{url(asset('/home/css/index.css'))}}" rel="stylesheet">
    <link href="{{url(asset('/home/css/style.css'))}}" rel="stylesheet">
    <link href="{{url(asset('/home/css/new.css'))}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="{{url(asset('/home/js/modernizr.js'))}}"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="{{url('/')}}"></a></div>
    <nav class="topnav" id="topnav">
        @foreach($navs as $k=>$v)<a href={{$v->nav_url}}><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach
    </nav>
</header>

@yield('content')

<footer>
    <p>Design by 后盾网 <a href="http://www.miitbeian.gov.cn/" target="_blank">http://www.houdunwang.com</a> <a href="/">网站统计</a></p>
</footer>
</body>
</html>
