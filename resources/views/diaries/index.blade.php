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

    <h2>検索</h2>
    <form action="/diaries" method="get">
        <label for="">日付</label>
        <input type="date" name="date" value="{{ request('date') }}">
        <select name="tag">
            <option value="" class="">すべてのタグ</option>
            @foreach($tags as $tag)
                <option value="{{ $tag }}" {{ request('tag') == $tag ? 'selected' : ''}}>{{$tag}}</option>
            @endforeach
        </select>

        <select name="sort" class="">
            <option value="desc" {{$sort == 'desc' ? 'selected' : ''}}>新しい順</option>
            <option value="asc" {{ $sort=='asc' ? 'selected' : ''}}>古い順</option>
        </select>
        <button type="submit">検索</button>
    </form>
    <p>
        <a href="/diaries">全件表示に戻る</a>
    </p>
    
    <h2>タグ一覧</h2>
    @foreach($tags as $tag)
    <a href="/diaries?tag={{$tag}}&sort={{$sort}}" class="">{{$tag}}</a>
    @endforeach
    <h2>日記一覧</h2>
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