<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($news_data as $item)
    <div>
        我是最新消息 <br>
    <img src="{{$item->img}}" alt="">
    <h4>
        {{$item->title}}
    </h4>
    <p>
        {{$item->content}}
    </p>
        <a href="/">
        點我回首頁
        </a>
        </div>
    @endforeach





</body>
</html>
