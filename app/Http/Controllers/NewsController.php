<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $list = DB::select('select * from news');

        return view('news.index',['list'=>$list]);

    }

}
