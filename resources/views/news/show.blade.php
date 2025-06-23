<!DOCTYPE html>
<html>
<head>
    <title>詳細ページ</title>
</head>
<body>


    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

    <table>
            <tr><th align="left">Title:</th><th align="left">{{$news->title}}</th></tr>
            <tr><th align="left">Content:</th><th align="left">{{ $news->body }}</th></tr>
            <tr><td>{{$news->created_at}}</td></tr>
            <tr><td>{{$news->updated_at}}</td></tr>
    </table>

    <form action="{{route('news.delete',['news'=>$news->id])}}" method="POST" onsubmit="return confirm('削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

<p><a href="{{route('news.edit',['news'=>$news->id])}}">編集する</a> </p>
<p><a href="/News">お知らせ一覧へ</a></p>

</body>
</html>
