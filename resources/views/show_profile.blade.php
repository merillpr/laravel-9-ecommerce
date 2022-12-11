<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <p>{{$user->is_admin ? 'Admin' : 'Member'}}</p>
    <form action="{{route('edit_profile')}}" method="post">
        @csrf
        <label for="name">Nama :</label><br>
        <input type="text" name="name"><br>
        <label for="password">Password :</label><br>
        <input type="password" name="password"><br>
        <label for="password">Password confirmation :</label><br>
        <input type="password" name="password_confirmation"><br>
        <button type="submit">Edit Profile</button>
    </form>
</body>
</html>