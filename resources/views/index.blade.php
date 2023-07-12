<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table table-striped">
    <thead>
        <td>User Name</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Is Admin</td>
        <td>Is Active</td>
    </thead>
    <tbody>
@foreach ($users as $user)
    <tr>
        <td>{{$user->username}}</td>
        <td>{{$user->first_name??'no first name'}}</td>
        <td>{{$user->last_name??'no last name'}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->is_admin}}</td>
        <td>{{$user->is_active}}</td>
        <td><a href={{url('/edit').'/'.$user->id}}>edit</a></td>
        <td><a href={{url('/delete').'/'.$user->id}}>delete</a></td>
    </tr>
@endforeach
</tbody>
</table> 
<div class='col-6'>
    {{$users->links()}}
</div> 
</body>
</html>