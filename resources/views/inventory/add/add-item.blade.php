@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
{{--    <form action="{{url('inventory/add/item/'.$inventoryId)}}" method="get" id="filter">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3 mb-3">--}}
{{--                <label for="Name" class="form-label">Name</label>--}}
{{--                <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">--}}
{{--            </div>--}}
{{--            <div class="col-md-3 mb-3">--}}
{{--                <label for="Phone" class="form-label">Phone</label>--}}
{{--                <input type="text" class="form-control" placeholder="Phone" aria-label="Phone" name="phone">--}}
{{--            </div>--}}
{{--            <div class="col-md-3 mb-3">--}}
{{--                <label for="Is_active" class="form-label">Is Active</label>--}}
{{--                <select class="form-select" id="Is_active" name='is_active'>--}}
{{--                    <option selected value="">all</option>--}}
{{--                    <option value="1">Active</option>--}}
{{--                    <option value="0">InActive</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="mb-3 d-inline-block col-md-4  pt-4 ">--}}
{{--                <button type="submit" class="btn btn-primary col-md-3 " value="submit">filter</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </form>--}}
    <form action="{{url('inventory/add/item/'.$inventoryId)}}" method="post">
        @csrf
        <table class="table table-striped table-light">
            <thead>
            <td>Quantity</td>
            <td>Image</td>
            <td>Item Name</td>
            <td>Item Brand Name</td>
            <td>Is Active</td>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><input type="text" class="form-control" placeholder="Available Quantity Is {{$item->item->quantity}}" aria-label="Quantity"
                               name="items{{"[$item->id]"}}"></td>
                    <td><img src="{{url('storage/images/items/'.$item->image)}}" width="60" height="60"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->brand->name}}</td>
                    <td>{{$item->is_active}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class='col-6 page-link'>
            {{$items->appends($queryParams)->links()}}
        </div>
        <div class="mb-3 d-inline-block col-md-4  pt-4 ">
            <button type="submit" class="btn btn-primary col-md-3 " value="submit">Add Items</button>
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
