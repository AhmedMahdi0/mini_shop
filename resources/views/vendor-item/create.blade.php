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
    <form action="{{url('/items/create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="brand_id">Brand</label>
            <select class="form-select" id="brand_id" name='brand_id'>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}" >{{$brand->name}}</option>
                @endforeach

            </select>

        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="brand_id">Vendor</label>
            <select class="form-select" id="vendor_id" name='vendor_id'>
                @foreach($vendors as $vendor)
                    <option value="{{$vendor->id}}" >{{$vendor->first_name.' '.$vendor->last_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Price</label>
            <input type="text" class="form-control" placeholder="price" aria-label="price" name="price">
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Quantity</label>
            <input type="text" class="form-control" placeholder="quantity" aria-label="quantity" name="quantity">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="Is_active">Is active</label>
            <select class="form-select" id="Is_active" name='is_active'>
                <option value="1" selected>Active</option>
                <option value="0">InActive</option>
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <label for="Notes" class="form-label">Image</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="icon" name="image" accept = 'image/jpeg , image/jpg, image/png'>
                <label class="input-group-text" for="icon">Upload</label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">create</button>
        </div>
    </form>
</div>
</div>
@include('dashboard.dashboardComponent.footer')
