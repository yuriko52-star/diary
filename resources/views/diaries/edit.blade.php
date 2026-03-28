<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記アプリ</title>
</head>
<body>
    <h1>日記編集</h1>
    <form action="/diaries/{{$diary->id}}/update" method="POST">
        @csrf
        <label for="">日付</label>
        <input type="date" name="date" value="{{ $diary->date }}">
        <label for="">本文</label>
        <textarea name="content">{{$diary->content }}</textarea>
        <label for="">タグ</label>
        <input type="text" name="tag" value="{{ $diary->tag }}">
        <button type="submit">更新</button>
    </form>
</body>
</html>