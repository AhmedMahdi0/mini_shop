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
    <form action="{{url('inventory/edit').'/'.$inventory->id}}" method="post">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name"
                   value="{{$inventory->name}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Notes</label>
            <input type="text" class="form-control" id="inputEmail4" name="phone" value="{{$inventory->phone}}">
        </div>

        <div class="col-md-12 mb-3">
            <label for="City" class="form-label">City</label>
            <select class="form-select" id="City" name='city'>
                    <option value="{{$inventory->city->id}}" selected>{{$inventory->city->name}}</option>
            @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="Is_active">Is active</label>
            <select class="form-select" id="Is_active" name='is_active'>
                <option value="1" @if($inventory->is_active) selected @endif>Active</option>
                <option value="0" @if(!$inventory->is_active) selected @endif>InActive</option>
            </select>
        </div>

        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">edit</button>
        </div>
    </form>

</div>
</div>
@include('dashboard.dashboardComponent.footer')
