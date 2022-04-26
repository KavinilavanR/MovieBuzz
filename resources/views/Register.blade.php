<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/17db0c1034.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/stylechangepassword.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap" rel="stylesheet">
    <title>MovieBuzz | Register</title>
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
            <form action="/register" method='post'>
                @csrf
                <div class="login-form">
                    <div class="input-grp">
                        <p>Username</p>
                        <input type="text" name="Uname" id="uname">
                    </div>
                    <div class="input-grp">
                        <p>New Password</p>
                        <input type="password" name="NPass" id="passwd">
                    </div>
                    <div class="input-grp">
                        <p>Confirm Password</p>
                        <input type="password" name="CPass" id="passwd">
                    </div>
                    <div class="input-grp">
                        <p>Date Of Birth</p>
                        <input type="date" name="DOB" id="DOB">
                    </div>
                </div>

        </div>
        <button type='submit' class="btn btn-bgless">Register&nbsp;&nbsp;<i class="fa-regular fa-user"></i></button>
        </form>
        <div class="exception">
            @if (isset($exception))
                <p>{{ $exception }}</p>
        </div>
        @endif
    </div>
</body>

</html>
