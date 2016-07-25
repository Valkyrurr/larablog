<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->published_at->format('M jS Y g:ia') }}</h5>
        {!! nl2br(e($post->body)) !!}
        <hr />
        <button class="btn btn-primary" onclick="history.go(-1)">« Back</button>
    </div>
</body>
</html>
