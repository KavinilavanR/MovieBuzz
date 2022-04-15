<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/styleAdminAccess.css') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

   <div class='container'>

     <table>
        
        <tr>
            <th>Username</th>
            
            <th>DOB</th>
            <th></th>
        </tr>
        
        @foreach($users as $user)
        <form action='/adminAccess/{{$user->id}}'method='post'>
            @csrf
        <tr>
            <td>{{$user->name}}</td>
            
            <td>{{$user->dob}}</td>  
            <td><input type="submit"value='make as admin'></td>  
        </tr>
        </form>
        @endforeach
    </table>
   </div>
</body>
</html>

    {{-- @if(isset($del))
    <script>alert("deleted");</script>
    @endif --}}