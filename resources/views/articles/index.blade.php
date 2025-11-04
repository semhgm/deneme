<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makaleler</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 2em; }
        ul { list-style-type: none; padding: 0; }
        li { background: #f4f4f4; padding: 1em; margin-bottom: 0.5em; border-radius: 5px; }
    </style>
</head>
<body>

<h1>Tüm Makaleler</h1>

@if($articles->isEmpty())
    <p>Gösterilecek makale bulunamadı.</p>
@else
    <ul>
        {{-- Bu kısım Blade'in sihri! Controller'dan gelen $articles değişkenini döngüye alıyoruz. --}}
        @foreach($articles as $article)
            <li>{{ $article->title }}</li>
            <li>{{ $article->content }}</li>

        @endforeach
    </ul>
@endif

</body>
</html>
