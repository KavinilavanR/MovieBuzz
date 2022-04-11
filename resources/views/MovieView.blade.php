<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/17db0c1034.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ url('/css/styleView.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap" rel="stylesheet">
  <title>MovieBuzz | Movie List</title>
</head>
<body>
  <div class="navbar">
    <form action='/MovieView/' method='post'>
      @csrf
    <input type="text" name="search" id="" placeholder="Search here">
    <button type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
   
    <a href=""><i class="fa-solid fa-filter"></i></a>
  </div>
  <div class="container">
    @if(isset($search))
        @foreach($movies as $movie)
        <a href='/movies/{{$movie->Id}}'>
          <div class="movie">
           <img src="./../images/{{$movie->Id}}.jpg" alt="x">
            <div class="movie-name">{{$movie->MovieName}}</div>
          </div></a>
          @endforeach

    
   @endif
  </div>
  @if(isset($access))
  <div class='links'>
  <a href='/addMovie'>Add a Movie &nbsp;<i class="fa-solid fa-plus"></i></a>
  <a href='/editMovie'>edit a Movie &nbsp;<i class="fa-solid fa-pencil"></i></a>
  <a href='/delMovie'>delete a Movie &nbsp;<i class="fa-solid fa-remove"></i></a>
  <a href='/adminAccess'>Admin Access &nbsp;<i class="fa-solid fa-unlock"></i></a>
    </div>
  @endif


</body>
</html>