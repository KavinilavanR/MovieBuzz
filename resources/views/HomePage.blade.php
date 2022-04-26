<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/17db0c1034.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap" rel="stylesheet">
    <title>MovieBuzz | Login</title>
</head>

<body>
    <div class="container">
        <p class="title">
            MovieBuzz&nbsp;<i class="fa-solid fa-circle-play"></i>
        </p>
        <p class="description">
            MovieBuzz offers showtimes and events around you!
        </p>
        <div class="forms">
            <form action="/login" method='post'>
                @csrf
                <div class="login-form">
                    <div class="input-grp">
                        <p>Username</p>
                        <input type="text" name="Uname" id="uname">
                    </div>
                    <div class="input-grp">
                        <p>Password</p>
                        <input type="password" name="Pass" id="passwd">
                    </div>
                    <a href="/forgetPassword">forget Password</a>
                </div>
                <button class="btn btn-bgless" type='submit'>LOGIN for the Experience&nbsp;&nbsp;<i
                        class="fa-solid fa-arrow-right-to-bracket"></i></button>
            </form>
        </div>
        <a href="/register" class="btn btn-bgless">Register! If you are a new User&nbsp;&nbsp;<i
                class="fa-regular fa-user"></i></a>
        @if (isset($incorrect_pass))
            <p>Incorrect Password!</p>
        @endif
        @if (isset($NotAUser))
            <p>Username Does not exist,Check your username<br>Register if you are a new user!</p>
        @endif
    </div>
    @if (isset($success))
        <script>
            alert('registered successful');
        </script>
    @endif
    @if (isset($passwordChanged))
        <script>
            alert('password changed successfully');
        </script>
    @endif


</body>

</html>
