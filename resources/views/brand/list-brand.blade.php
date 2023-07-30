@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    <form action="{{url('brands')}}" method="get" id="filter">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
            </div>
            <div class="col-md-3 mb-3">
                <label for="Notes" class="form-label">Notes</label>
                <input type="text" class="form-control" placeholder="Notes" aria-label="Notes" name="notes">
            </div>
            <div class="mb-3 d-inline-block col-md-4  pt-4 ">
                <button type="submit" class="btn btn-primary col-md-3 " value="submit">filter</button>
            </div>
        </div>

    </form>

    <table class="table table-striped table-light">
        <thead>
        <td>Icon</td>
        <td>Name</td>
        <td>Notes</td>
        <td>Edit</td>
        <td>Delete</td>
        </thead>
        <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td><img src="{{asset('storage/images/brands/'.$brand->icon)}}" width="60" height="60" alt="Brand Image"></td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->notes}}</td>
                <td><a href={{url('brands/edit').'/'.$brand->id}}>edit</a></td>
                <td><a href={{url('brands/delete').'/'.$brand->id}}>delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class='col-6 page-link'>
        {{$brands->appends($queryParams)->links()}}
    </div>
</div>
</div>


<div>
    @include('dashboard.dashboardComponent.footer')

    <script>
    $('#filter').submit(function (event) {
        event.preventDefault();

        const queryParams = [];

        // Process input fields
        $(this).find('input[name]').each(function () {
            const input = $(this);
            const value = input.val().trim();

            if (value !== '') {
                const paramName = encodeURIComponent(input.attr('name'));
                const paramValue = encodeURIComponent(value);
                queryParams.push(paramName + '=' + paramValue);
            }
        });

        // Process select fields
        $(this).find('select[name]').each(function () {
            const select = $(this);
            const value = select.val();

            if (value !== '' && value !== 'null') {
                const paramName = encodeURIComponent(select.attr('name'));
                const paramValue = encodeURIComponent(value);
                queryParams.push(paramName + '=' + paramValue);
            }
        });

        const queryString = queryParams.join('&');
        const url = this.action + '?' + queryString;
        window.location.href = url;
    });

    </script>
