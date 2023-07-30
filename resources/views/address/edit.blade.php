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
    <form action="{{url("address/$type/update").'/'.$id}}" method="post">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="city" class="form-label">City</label>
            <select class="form-select" id="city" name='city'>
                @if($address)
                <option value="{{$address->city->id}}">{{$address->city->name}}</option>
                @endif
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">District</label>
            <input type="text" class="form-control" id="inputEmail4" name="district"@if($address) value="{{$address->district}}@endif">
        </div>

        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Street</label>
            <input type="text" class="form-control" id="inputEmail4" name="street"@if($address) value="{{$address->street}}@endif">
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Phone</label>
            <input type="text" class="form-control" id="inputEmail4" name="phone"@if($address) value="{{$address->phone}}@endif">
        </div>


        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>
</div>
@include('dashboard.dashboardComponent.footer')
