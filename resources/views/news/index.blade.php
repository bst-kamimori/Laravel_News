<!-- resources/views/news/index.blade.php -->
<html>
<head>
    <title>Laravel News</title>
</head>
<body>
<h1>Laravel News</h1>
<p>お知らせ一覧</p>

<p><a href="{{route('news.create')}}">お知らせの登録</a></p>

@php
    $nextSort=($sort === '1') ? '0' : '1';
@endphp

<a href ="{{route('news.index',['sort'=>$nextSort])}}">投稿日付でソート({{$sort === '0' ? '昇順' : '降順' }})
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
            <td><a href="{{route('news.show',['n_id'=>$item->id])}}">{{ $item->title }}</a></td>
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
