@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    @if($errors->all()!=null)
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $err)
                {{$err}}
                <hr>
            @endforeach
        </div>
    @endif
    <form action="{{url('/edit').'/'.$user->id}}" method="post">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">User name</label>
            <input type="text" class="form-control" placeholder="Username" aria-label="username" name="username"
                   value="{{$user->username}}">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name"
                       name="first_name" value="{{$user->first_name}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Last name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last_name"
                       value="{{$user->last_name}}">
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$user->email}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="Is_active">Is active</label>
            <select class="form-select" id="Is_active" name='is_active'>
                <option value="1" @if($user->is_active) selected @endif>Active</option>
                <option value="0" @if(!$user->is_active) selected @endif>InActive</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="Is_admin">Is Admin</label>
            <select class="form-select" id="Is_admin" name='is_admin'>
                <option @if(!$user->is_admin) selected @endif value="0">User</option>
                <option @if($user->is_admin) selected @endif value="1">Admin</option>
            </select>
        </div>


        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">edit</button>
        </div>
    </form>

</div>
</div>
@include('dashboard.dashboardComponent.footer')
