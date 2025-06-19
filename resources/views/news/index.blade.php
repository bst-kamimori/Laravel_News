<!-- resources/views/news/index.blade.php -->
<html>
<head>
    <title>Laravel News</title>
</head>
<body>
<h1>Laravel News</h1>
<p>お知らせ一覧</p>

<p><a href="{{route('news.create')}}">お知らせの登録</a></p>

<table>
    <tr><th align="left">No.</th><th align="left">Title</th><th align="left">Content</th><th align="left">date</th></tr>
    @foreach($list as $item)

        <tr>
            <td>{{$item->id.'.'}}</td>
            <td><a href="{{route('news.show',['news'=>$item->id])}}">{{ $item->title }}</a></td>
            <td>{{ $item->body }}</td>
            <td>{{$item->created_at}}</td>
        </tr>

    @endforeach
</table>

@if(session('success'))
    <p>{{session('success')}}</p>
@endif
</body>
</html>
