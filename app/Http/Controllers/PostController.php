<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //
    /**
     * 显示文章列表.
     *
     * @return Response
     */
    public function index()
    {
        //
        $posts = Cache::get('posts',[]);
        if(!$posts)
            exit('Nothing');

        $html = '<ul>';

        foreach ($posts as $key=>$post) {
            $html .= '<li><a href='.route('post.show',['post'=>$key]).'>'.$post['title'].'</li>';
        }

        $html .= '</ul>';

        return $html;
        var_dump('index');
    }

    /**
     * 创建新文章表单页面
     *
     * @return Response
     */
    public function create()
    {
        //
        $postUrl = route('post.store');
        $csfr_field = csrf_field();
        $html = <<<CREATE
           <form action="$postUrl" method="POST">
            $csfr_field
            <input type="text" name="title"><br/><br/>
            <textarea name="content" cols="50" rows="5"></textarea><br/><br/>
            <input type="submit" value="提交"/>
        </form>
CREATE;
   return $html;

    }

    /**
     * 将新创建的文章存储到存储器
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $title = $request->input('title');
        $content = $request->input('content');
        $post = ['title' => trim($title),'content' => trim($content)];
        $posts = Cache::get('posts',[]);
        if (!Cache::get('post_id')){
            Cache::add('post_id',1,60);
        }else {
           Cache::increment('post_id',1);
        }

        $posts[Cache::get('post_id')] = $post;
        Cache::put('posts',$posts,60);
        return redirect()->route('post.show',['post' => Cache::get('post_id')]);

        var_dump('store');
    }

    /**
     * 显示指定文章
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $posts = Cache::get('posts',[]);
        if (!$posts || !$posts[$id]){
            exit('Noting Found!');
        }

        $post = $posts[$id];
        $editUrl = route('post.edit',['post' => $id]);
        $html = <<<DETAIL
       <h3>{$post['title']}</h3>
       <p>{$post['content']}</p>
       <p><a href="{$editUrl}"></a></p>
DETAIL;
    return $html;
        var_dump('show');
    }


    /**
     * 显示编辑指定文章的表单页面
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Found！');
        $post = $posts[$id];

        $postUrl = route('post.update',['post'=>$id]);
        $csrf_field = csrf_field();
        $html = <<<UPDATE
        <form action="$postUrl" method="POST">
            $csrf_field
            <input type="hidden" name="_method" value="PUT"/>
            <input type="text" name="title" value="{$post['title']}"><br/><br/>
            <textarea name="content" cols="50" rows="5">{$post['content']}</textarea><br/><br/>
            <input type="submit" value="提交"/>
        </form>
UPDATE;
        return $html;
    }

    /**
     * 在存储器中更新指定文章
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        var_dump('update');
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Found！');

        $title = $request->input('title');
        $content = $request->input('content');

        $posts[$id]['title'] = trim($title);
        $posts[$id]['content'] = trim($content);

        Cache::put('posts',$posts,60);
        return redirect()->route('post.show',['post'=>Cache::get('post_id')]);
    }

    /**
     * 从存储器中移除指定文章
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Deleted！');

        unset($posts[$id]);
        Cache::decrement('post_id',1);

        return redirect()->route('post.index');
        var_dump('destroy');

    }


}
