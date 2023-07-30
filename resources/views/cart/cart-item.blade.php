@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    <table class="table table-striped table-light">
        <thead>
        <td>Image</td>
        <td>Quantity</td>
        <td>Name</td>
        <td>Brand Name</td>
        <td>Price</td>
        <td>Delete</td>
        </thead>
        <tbody>
        @if($items)
        @foreach ($items as $key=>$item)
            <form action="" method="get">
                <tr>
                    <input type="hidden" name="id" value="{{$key}}">
                    <td><img src="{{asset('storage/images/items/'.$item[1])}}" width="60" height="60" alt="Brand Image">
                    </td>
                    <td><input type="text" class="form-control" placeholder="Available Quantity" aria-label="Quantity"
                               name="quantity[{{$key}}]"></td>
                    <td>{{$item[2]}}</td>
                    <td>{{$item[3]??'no brand active'}}</td>
                    <td>{{$item[4]}}</td>
                    <td><a href={{url('cart').'/'.$item[0]}}>delete</a></td>
                </tr>
            </form>
        @endforeach
        @endif
        </tbody>
    </table>
    <div class='col-6 page-link'>
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
