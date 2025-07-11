<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort','1');
        $s_url = $sort === '0' ? 'asc' : 'desc';
        $keyword=$request->input('keyword');

        $query=News::query();

        if(!empty($keyword)) {
            $query->where('title','LIKE',"%{$keyword}%")
                ->orWhere('body','LIKE',"%{$keyword}%");
        }

        $list = $query->orderBy('created_at',$s_url)
                ->paginate(5)
                ->withQueryString();

        return view('news.index',compact('list','keyword','sort'));
    }
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:0|max:500',
            'body' => 'required|min:0|max:60000',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->save();

        return redirect('/News')->with('success','投稿が保存されました！');
    }

    public function show($id)
    {
        $news=News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        $news=News::findOrFail($id);
        return view('news.edit',compact('news'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
           'title'=>'required | min:1 | max:500',
            'body' => 'required | min:1 | max:6000'
        ]);

        $news=News::findOrFail($id);
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->save();

        return redirect()->route('news.show',['id'=>$news->id])
            ->with('success',"更新しました！");
    }

    public function delete($id)
    {
        try{
            $news=News::findOrFail($id);
            $news->delete();
            return redirect()->route('news.index')->with('remove','削除しました!');
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

}



