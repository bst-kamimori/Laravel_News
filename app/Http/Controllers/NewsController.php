<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $list = news::all();
        return view('news.index', ['list' => $list]);
    }
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
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


}
