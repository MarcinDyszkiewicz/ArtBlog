<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Marcin Dyszkiewicz">

    <title>Biblioteka | Home Page</title>
</head>

<body>
<div class="container">
    <div class="library">

        <h1>Biblioteka</h1>

        <div class="library-table">

            <table style="width: 50%">
                <tr>
                    <th>#ID</th>
                    <th>Autor</th>
                    <th>Tytuł</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($books as $book)
                <tr style="text-align: center">
                    <td>{{$book->id}}</td>
                    <td>{{$book->author}}</td>
                    <td>"{{str_limit($book->title, 10, '...')}}"</td>
                    <td><form action="{{route('bookEdit', $book->id)}}">
                            <input type="submit" value="Edytuj">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{route('bookDelete', $book->id)}}">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <input type="submit" value="Usuń">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>




    <br>
    <hr>
    <div class="add-book">

        <h2>Dodaj nową książkę</h2>

        <form method="POST" action="{{route('bookStore')}}">
            {{ csrf_field() }}
            Autor: <input name="author" type="text">
            <br>
            <br>
            Tytuł: <input name="title" type="text">
            <br>
            <br>
            <input type="submit" value="Dodaj">
        </form>

    </div>


</div>



</body>
</html>