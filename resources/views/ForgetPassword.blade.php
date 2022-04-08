
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/17db0c1034.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style1.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap" rel="stylesheet">
  <title>MovieBuzz | ForgetPassword</title>
</head>
<body>
    <div class="container">
      <p class="title">
        MovieBuzz&nbsp;<i class="fa-solid fa-circle-play"></i>
      </p>
      
      <div class="forms">
      <form action="/forgetPassword" method='post' >
        @csrf
      <div class="login-form">
        <div class="input-grp">
        <p>Username</p>
        <input type="text" name="Uname" id="uname">
        </div>
        <div class="input-grp">
        <p>Date Of Birth</p>
        <input type="password" name="DOB" id="passwd">
        </div>
       
      </div>
        
  </div>
      <button type='submit' class="btn btn-bgless">Verify&nbsp;&nbsp;<i class="fa-regular fa-user"></i></button>
    </form>
    
</body>
</html>