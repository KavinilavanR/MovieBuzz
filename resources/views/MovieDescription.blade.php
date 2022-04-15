<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/17db0c1034.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ url('/css/styleDesc.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap" rel="stylesheet">
  <title>MovieBuzz | Movie List</title>
</head>
<body>
  <div class="container">
    <div class="dp-img">
      <img src="./../images/{{$movie->id}}.jpg" alt="x">
    </div>
    <div class="vl"></div>
    <div class="description">
      <div class="description-unit">
        <p class="lead">Movie Name</p>
        <p class="value">{{$movie->name}}</p>
      </div>
      <div class="description-unit">
        <p class="lead">Language(s)</p>
        <p class="value">{{$movie->languages}}</p>
      </div>
      <div class="description-unit">
        <p class="lead">Duration</p>
        <p class="value">{{$movie->duration}}</p>
      </div>
      <div class="description-unit">
        <p class="lead">Cast 'N' Crew</p>
        <p class="value">{{$movie->cast_n_crew}}</p>
      </div>
      <div class="description-unit">
        <p class="lead">Release Date</p>
        <p class="value">{{$movie->release_date}}</p>
      </div>
      
    </div>
  </div>
</body>
</html>