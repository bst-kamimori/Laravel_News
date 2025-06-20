<!DOCTYPE html>
<html>
<head>
    <title>詳細編集ページ</title>
</head>
<body>

<h2>No.{{$news->id}}の編集</h2>

<form action="{{route('news.update',['news'=>$news->id])}}" method="POST">
    @csrf
    @method('PUT')

<table>
    <tr><th align="left">Title:</th><th align="left"><input type="text" name="title" value="{{ old('title', $news->title) }}"></th></tr>
    <tr><th align="left">Content:</th><th align="left"><textarea name="body">{{ old('title', $news->body) }}</textarea></th></tr>
    <tr><td>{{$news->created_at}}</td></tr>
    <tr><td>{{$news->updated_at}}</td></tr>
</table>

    <p><button type="submit">更新する</button>
        <a href="{{route('news.show',['news'=>$news->id])}}">戻る</a>
    </p>

</form>


</body>
</html>
