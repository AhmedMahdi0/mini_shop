@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    <form action="{{url('items/add/vendor/'.$itemId)}}" method="post">
        @csrf
    <table class="table table-striped table-light">
        <thead>
        <td>select</td>
        <td>Vendor First Name</td>
        <td>Vendor Last Name</td>
        <td>Vendor Phone Number</td>
        </thead>
        <tbody>
        @foreach ($vendors as $vendor)
            <tr>
                <td><input type="text" class="form-control" placeholder="Add Quantity" aria-label="Quantity"
                           name="items{{"[$vendor->id]"}}"></td>
                <td>{{$vendor->first_name}}</td>
                <td>{{$vendor->last_name}}</td>
                <td>{{$vendor->phone}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class='col-6 page-link'>
        {{$vendors->appends($queryParams)->links()}}
    </div>
        <div class="mb-3 d-inline-block col-md-4  pt-4 ">
            <button type="submit" class="btn btn-primary col-md-3 " value="submit">Add Vendors</button>
        </div>
    </form>
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
