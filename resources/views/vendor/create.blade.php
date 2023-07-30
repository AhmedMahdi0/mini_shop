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
    <form action="{{url('/vendors/create')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first_name" >
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Last name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"name="last_name" >
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Phone</label>
            <input type="text" class="form-control" id="inputEmail4" name="phone">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="Is_active">Is active</label>
            <select class="form-select" id="Is_active" name='is_active'>
                <option value="1" selected>Active</option>
                <option value="0">InActive</option>
            </select>
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">create</button>
        </div>
    </form>
</div>
</div>
@include('dashboard.dashboardComponent.footer')
