@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    <table class="table table-striped table-light">
        <thead>
        <td>Item Name</td>
        <td>Inventory Name</td>
        <td>Status</td>
        <td>Quantity</td>
        <td>Order At</td>
        </thead>
        <tbody>
        @foreach ($purchase as $item)
                <tr>
                    <td>{{$item->item->name}}</td>
                    <td>{{$item->inventory->name}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
        @endforeach
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
