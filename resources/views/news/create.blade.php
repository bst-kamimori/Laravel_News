<!-- resources/views/news/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>新規作成ページ</title>
</head>
<body>
    <h2>新規お知らせフォーム</h2>

    <form action="{{route('news.store')}}" method="POST">
    @csrf
        <table>
        <tr><th>Title:</th>
            <td><input type="text" name="title" value="{{old('title')}}"></td>
            @if($errors->has('title'))
                <p>{{$errors->first('title')}}</p>
            @endif
        </tr>
        <tr><th>Content:</th>
            <td><input type="text" name="body" value="{{old('body')}}"></td>
            @if($errors->has('body'))
                <p>{{$errors->first('body')}}</p>
            @endif
        </tr>
        </table>
        <button type="submit">投稿を保存する</button>
    </form>

    <p><a href="/News">お知らせ一覧へ</a></p>

</body>
</html>
