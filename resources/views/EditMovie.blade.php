<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/styleEditMovie.css') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <div class='container'>

        <table>

            <tr>
                <th>Movie Name</th>
                <th>Release Date</th>
                <th>Duration</th>
                <th></th>
            </tr>

            @foreach ($movies as $movie)
                <form action='/editMovie/{{ $movie->id }}' method='post'>
                    @csrf
                    <tr>
                        <td>{{ $movie->name }}</td>
                        <td><input type='text' value={{ $movie->release_date }} name='name'></td>
                        <td><input type='text' value={{ $movie->duration }} name='name'></td>

                        <td><input type="submit" value='Edit'></td>
                    </tr>
                </form>
            @endforeach
        </table>
    </div>
</body>

</html>

{{-- @if (isset($del))
    <script>alert("deleted");</script>
    @endif --}}
