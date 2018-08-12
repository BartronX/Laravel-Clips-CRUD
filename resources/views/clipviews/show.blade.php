<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <title>Show Clip</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('clips') }}">Home</a>
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('clips/create') }}">Create a Clip</a></li>
            </ul>
        </nav>

        <h1>Showing {{ $clip->name}}</h1>

        <div class="jubotron text-center">
            <h2>{{ $clip->name }}</h2>
            <p>
                <strong>Category ID:</strong> {{ $clip->categoryid }}<br>
            </p>
        </div>
    </div>
</body>
</html>