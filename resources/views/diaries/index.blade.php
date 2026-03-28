<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記アプリ</title>
</head>
<body>
    <h1>日記アプリ</h1>
    <form action="/diaries" method="POST">
        @csrf
        <label for="">日付</label>
        <input type="date" name="date">
        <label for="">本文</label>
        <textarea name="content"></textarea>
        <label for="">タグ</label>
        <input type="text" name="tag">
        <button type="submit">保存</button>
    </form>

    
        @foreach($diaries as $diary)
           <p> 
            日付:{{ $diary->date }}
            </p>
           <p>
            本文:{{ $diary->content }}
           </p> 
           <p>
            タグ:{{ $diary->tag }}
           </p>
           <a href="/diaries/{{$diary->id}}/edit" class="">編集画面へ</a> 
           <form action="/diaries/{{$diary->id}}/delete" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
           </form>
        @endforeach
    
</body>
</html>