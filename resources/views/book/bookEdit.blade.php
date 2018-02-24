<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marcin Dyszkiewicz">

    <title>Biblioteka | edytuj "{{$book->title}}"</title>
</head>

<body>
<div class="container">
    <div class="edit-book">

        <h2>Edytuj książkę "{{$book->title}}"</h2>

        <form method="POST" action="{{route('bookUpdate', $book->id)}}">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            Title: <input name="author" type="text" value="{{old('author', $book->author)}}">
            <br>
            <br>
            Body: <input name="title" type="text" value="{{old('title', $book->title)}}">
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>

    </div>
</div>


</body>
</html>
