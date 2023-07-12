<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action="{{url('/edit').'/'.$user->id}}" method="post">
@csrf
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">User name</label>
    <input type="text" class="form-control" placeholder="Username" aria-label="username" name="username" value="{{$user->username}}">
</div>

<div class="row">
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">First name</label>
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first_name" value="{{$user->first_name}}">
</div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Last name</label>
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"name="last_name" value="{{$user->last_name}}">
</div>
</div>
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$user->email}}">
</div>
<div class="col-12">
    <button type="submit" class="btn btn-primary">edit</button>
  </div>
</form>  
</body>
</html>