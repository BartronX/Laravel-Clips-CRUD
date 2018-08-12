<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <title>Clips</title>
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

    <h1>Clips</h1>

    <!-- Show messages that may appear -->
    @if(Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message')}}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thread>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Category ID</td>
            </tr>
        </thread>

        <tbody>
        @foreach($clips as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->categoryid}}</td>

                <!-- show, edit, and delete buttons -->
                <td>
                    <!-- Show clip -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('clips/'.$value->id) }}">Show Clip</a>

                    <!-- Edit clip -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('clips/'.$value->id.'/edit') }}">Edit Clip</a>
        
                    <!-- Delete clip -->
                    {{ Form::open(array('url'=> 'clips/'.$value->id, 'class'=> 'pull-right') )}}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete Clip', array('class'=> 'btn btn-warning')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>