<!-- resources/views/news/index.blade.php -->
<html>
<head>
    <title>Laravel News</title>
</head>
<body>
<h1>Laravel News</h1>
<p>お知らせ</p>
<ul>
    @foreach($list as $item)
        <li>{{ $item->title }} - {{ $item->body }}</li>
    @endforeach
</ul>
</body>
</html>
