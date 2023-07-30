@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    <form action="{{url('items')}}" method="get" id="filter">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
            </div>
            <div class="col-md-3 mb-3">
                <label for="Is_active" class="form-label">Is Active</label>
                <select class="form-select" id="Is_active" name='is_active'>
                    <option selected value="">all</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="brand_id" class="form-label">Brand</label>
                <select class="form-select" id="brand_id" name='brand_id'>
                    <option selected value="">all</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="inventory_id" class="form-label">Inventory</label>
                <select class="form-select" id="inventory_id" name='inventory_id'>
                    <option selected value="">all</option>
                    @foreach($inventories as $inventory)
                        <option value="{{$inventory->id}}">{{$inventory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="vendor_id" class="form-label">Vendor</label>
                <select class="form-select" id="vendor_id" name='vendor_id'>
                    <option selected value="">all</option>
                    @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->first_name.' '.$vendor->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="item_number" class="form-label">Item Number</label>
                <select class="form-select" id="item_number" name='item_number'>
                    <option selected value="">all</option>
                    <option value="on">Item Number Over 50</option>
                </select>
            </div>
        </div>
        <div class="row">

            <div class="mb-3 d-inline-block col-md-4  pt-4 ">
                <button type="submit" class="btn btn-primary col-md-3 " value="submit">filter</button>
            </div>
        </div>

    </form>

    <table class="table table-striped table-light">
        <thead>
        <td>Image</td>
        <td>Name</td>
        <td>Brand Name</td>
        <td>Price</td>
        <td>Total Purchases</td>
        <td>Total Sales</td>
        <td>Is Active</td>
        <td>Edit</td>
        <td>Delete</td>
        <td>add to cart</td>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td><img src="{{asset('storage/images/items/'.$item->image)}}" width="60" height="60" alt="Brand Image">
                </td>
                <td>{{$item->name}}</td>
                <td>{{$item->brand->name??'no brand active'}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->total_purchases}}</td>
                <td>{{$item->total_sales}}</td>
                <td>{{$item->is_active?'Active':'InActive'}}</td>
                <td><a href={{url('items/edit').'/'.$item->id}}>edit</a></td>
                <td><a href={{url('items/delete').'/'.$item->id}}>delete</a></td>

                @if($item->is_purchases && $item->is_active)
                <td>
                    <form action="{{url('cart')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$item->id}}" name="id">
                        <a href={{url('cart')}}  onclick="event.preventDefault();this.closest('form').submit();"
                           aria-expanded="false">add to cart</a></form>
                </td>
                @else
                    <td>Can not Purchases</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class='col-6 page-link'>
        {{$items->appends($queryParams)->links()}}
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
