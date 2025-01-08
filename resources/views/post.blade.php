<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>

<body>
    @foreach ($posts as $post)
        <ul>
            <li>Id: {{ $post->id }}</li>
            <li>Judul: {{ $post->title }}</li>
            <li>Judul: {{ $post->content }}</li>
        </ul>
        <hr>
    @endforeach
</body>

</html>
