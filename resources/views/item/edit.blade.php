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
    <form action="{{url('items/edit').'/'.$item->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name"
                   value="{{$item->name}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="Is_active">Is active</label>
            <select class="form-select" id="Is_active" name='is_active'>
                <option value="1" @if($item->is_active) selected @endif>Active</option>
                <option value="0" @if(!$item->is_active) selected @endif>InActive</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="brand_id">Brand</label>
            <select class="form-select" id="brand_id" name='brand_id'>
                <option value="{{$item->brand_id??''}}"  selected>{{$item->brand->name??'no value'}}</option>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Price</label>
            <input type="text" class="form-control" placeholder="price" aria-label="price" name="price" value="{{$item->price}}">
        </div>

        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Quantity</label>
            <input type="text" class="form-control" placeholder="quantity" aria-label="quantity" name="quantity" value="{{$quantity->quantity}}">
        </div>

        <div class="col-md-12 mb-3">
            <label for="Notes" class="form-label">Image</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="icon" name="image" accept = 'image/jpeg , image/jpg, image/png'>
                <label class="input-group-text" for="icon">Upload</label>
            </div>
        </div>
        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">edit</button>
        </div>
    </form>

</div>
</div>
@include('dashboard.dashboardComponent.footer')
