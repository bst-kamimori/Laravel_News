<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $sort=$request->query('sort','1');

        $s_url=$sort === '0' ? 'asc':'desc';

        $list = News::orderBy('created_at',$s_url)
                ->simplePaginate(6);

        return view('news.index',
            ['list' => $list,
            'sort'=>$sort
            ]);
    }
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required|between:0,15',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->save();

        return redirect('/News')->with('success','投稿が保存されました！');
    }

    public function show(News $news)
    {

        return view('news.show', ['news' => $news]);
    }

    public function edit(News $news)
    {
        return view('news.edit',['news'=>$news]);
    }

    public function update(Request $request,News $news)
    {
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->save();

        return redirect()->route('news.show',['news'=>$news->id])
            ->with('success',"更新しました！");
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('remove','削除しました!');
    }


}
