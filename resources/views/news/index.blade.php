<!-- resources/views/news/index.blade.php -->
<html>
<head>
    <title>Laravel News</title>
</head>
<body>
<h1><a href="/News">Laravel News</a></h1>
<h3>お知らせ一覧</h3>

<p><a href="{{route('news.create')}}">お知らせの登録</a></p>

<form action="{{route('news.index')}}" method="GET">
    <input type="text" name="keyword" value="{{$keyword??''}}">
    <button type="submit">検索</button>
</form>

@php
    $nextSort=($sort === '1') ? '0' : '1';
@endphp

<a href ="{{route('news.index',['sort'=>$nextSort,'keyword'=>$keyword])}}">投稿日付でソート({{$sort === '0' ? '昇順' : '降順' }})
</a>

<table>
    <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Content</th>
        <th align="left">date</th>
    </tr>
    @foreach($list as $index=> $item)

        <tr>
            <td>{{$index+1}}.</td>
            <td><a href="{{route('news.show',['id'=>$item->id])}}">{{ $item->title }}</a></td>
            <td>{{ $item->body }}</td>
            <td>{{$item->created_at}}</td>
        </tr>

    @endforeach
</table>

{{$list->links()}}

@if(session('success'))
    <p>{{session('success')}}</p>
@endif

@if(session('remove'))
    <p>{{session('remove')}}</p>
@endif

</body>
</html>
