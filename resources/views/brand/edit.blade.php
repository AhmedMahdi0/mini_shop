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
    <form action="{{url('brands/edit').'/'.$brand->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name"
                   value="{{$brand->name}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Notes</label>
            <input type="text" class="form-control" id="inputEmail4" name="notes" value="{{$brand->notes}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="Notes" class="form-label">Icon</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="icon" name="icon" accept = 'image/jpeg , image/jpg, image/png'>
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
