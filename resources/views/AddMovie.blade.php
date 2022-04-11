
<!DOCTYPE html>
<head>
  {{-- <link rel="stylesheet" type="text/css" href="{{ url('/css/styleAddMovie.css') }}" /> --}}
</head>
<div class='add'>
    <form action="/movies" method='post'enctype='multipart/form-data'>
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
         <label for="myfile">Select a file:</label>
      <input type="file" id="myfile" name="myfile">
  
      <input type="submit" value="Submit">
    </form> 
    </div>