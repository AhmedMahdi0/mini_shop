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
    <form action="{{url('/inventory/create')}}" method="post">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
        </div>
        <div class="col-md-12 mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="col-md-12 mb-3">
            <label for="City" class="form-label">City</label>
            <select class="form-select" id="City" name='city'>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 mb-3">
            <label for="Is_active" class="form-label">Is Active</label>
            <select class="form-select" id="Is_active" name='is_active'>
                <option value="1" >Active</option>
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
