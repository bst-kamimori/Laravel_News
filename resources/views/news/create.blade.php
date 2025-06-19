<!-- resources/views/news/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>新規作成ページ</title>
</head>
<body>
    <h1>新規お知らせフォーム</h1>

    <form action="{{route('news.store')}}" method="POST">
    @csrf
        <table>
        <tr><th>Title:</th>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr><th>Content:</th>
            <td><input type="text" name="body" required></td>
        </tr>
        </table>
        <button type="submit">投稿を保存する</button>
    </form>

    <p><a href="/News">お知らせ一覧へ</a></p>

</body>
</html>
