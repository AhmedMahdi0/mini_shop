<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @if($errors->all()!=null)
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $err)
        {{$err}}
        <hr>
    @endforeach
</div>
    @endif
<form action="{{url('/create')}}" method="post">
@csrf
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">User name</label>
    <input type="text" class="form-control" placeholder="Username" aria-label="username" name="username">
</div>

<div class="row">
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">First name</label>
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first_name" >
</div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Last name</label>
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"name="last_name" >
</div>
</div>
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="password" aria-label="password" name="password" >
</div>
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Password Confirmation</label>
    <input type="password" class="form-control" placeholder="password confirmation" aria-label="password_confirmation" name="password_confirmation" >
</div>
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email">
</div>
<div class="input-group mb-3">
    <label class="input-group-text" for="Is_active">Is active</label>
    <select class="form-select" id="Is_active" name='is_active'>
      <option value="1" selected>Active</option>
      <option value="0">InActive</option>
    </select>
  </div>
  
<div class="input-group mb-3">
    <label class="input-group-text" for="Is_admin">Is Admin</label>
    <select class="form-select" id="Is_admin" name='is_admin'>
      <option value="0" selected>User</option>
      <option value="1">Admin</option>
    </select>
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">create</button>
  </div>
</form>  
</body>
</html>