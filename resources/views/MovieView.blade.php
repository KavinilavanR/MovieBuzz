<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/17db0c1034.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ url('/css/style2.css') }}">
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
    <input type='submit' value='search'>
    </form>
    <a href=''><i class="fa-solid fa-magnifying-glass"></i></a>
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

    @else
    @for($i=1;$i<=20;$i++)  
    <div class="movie">
      <img src="./images/{{$i}}.jpg" alt="x">
      <div class="movie-name">Antman 2</div>
    </div>
   @endfor
   @endif
  </div>
  @if(isset($access))
  <div class='add'>
  <form action="/movies" method='post'>
    @csrf
    <label for="fname">MovieName:</label><br>
    <input type="text" id="Mname" name="Mname" ><br>
    <label for="lname">Duration:</label><br>
    <input type="time" id="lname" name="Duration"><br>
    Cast:<br>
    <textarea id="w3review" name="Cast" rows="4" cols="50" placeholder="hero,heroine,director ...comma seperated"></textarea><br>
    <label for="lname">Release Date:</label><br>
    <input type="date" id="lname" name="ReleaseDate"><br>
    Choose Languages:<br>
        <input type="checkbox" name="language[]" value="1">English<br>
       <input type="checkbox" name="language[]" value="2">Malayalam<br>
       <input type="checkbox" name="language[]" value="3">Telugu<br>
        <input type="checkbox" name="language[]" value="4">Tamil<br>
       <input type="checkbox" name="language[]" value="5"> Hindi<br>
        
    <input type="submit" value="Submit">
  </form> 
  </div>
  @endif


</body>
</html>