<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <title>Edit Clip</title>
</head>
<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('clips/create') }}">Create a Clip</a></li>
            </ul>
        </nav>

        <h1>Edit {{ $clip->name }}</h1>

        <!-- For creation errors -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($clip, array('route'=> array('clips.update', $clip->id), 'method'=> 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name')}}
            {{ Form::text('name', null, array('class'=> 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('categoryid', 'Category ID')}}
                {{ Form::text('categoryid', null, array('class'=> 'form-control')) }}
        </div>

        {{ Form::submit('Save Changes', array('class'=> 'btn btn-primary')) }}
        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>

        {{ Form::close() }}
    </div>
</body>
</html>