<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{ auth()->user(); }}
    @foreach ($pastes as $paste)
        <p>{{ $paste->title }}</p>
        <small>{{ $paste->language }}</small>
    @endforeach
</body>
</html>