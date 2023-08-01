@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper p-4">
    <form action="{{route('users')}}" method="get" id="filter">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="User Name" class="form-label">User Name</label>
                <input type="text" class="form-control" placeholder="User Name" aria-label="User Name" name="username">
            </div>
            <div class="col-md-4 mb">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email">
            </div>
            <div class="col-md-3 mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="Is_active" class="form-label">Is Active</label>
                <select class="form-select" id="Is_active" name='is_active'>
                    <option selected value="">all</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="Is_admin" class="form-label">Is Admin</label>
                <select class="form-select" id="Is_admin" name='is_admin'>
                    <option selected value="">all</option>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="mb-3 d-inline-block col-md-4  pt-4 ">
                <button type="submit" class="btn btn-primary col-md-3 " value="submit">filter</button>
            </div>
        </div>

    </form>

    <table class="table table-striped table-light">
        <thead>
        <td>User Name</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Is Admin</td>
        <td>Is Active</td>
        <td>Address</td>
        <td>Edit</td>
        <td>Delete</td>
        </thead>
        <tbody>
        @php try{ @endphp
        @foreach ($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->first_name??'no first name'}}</td>
                <td>{{$user->last_name??'no last name'}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_admin}}</td>
                <td>{{$user->is_active}}</td>
                <td><a href={{url('address/users/update/').'/'.$user->id}}>Address</a></td>
                <td><a href={{url('/edit').'/'.$user->id}}>edit</a></td>
                <td><a href={{url('/delete').'/'.$user->id}}>delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class='col-6 page-link'>
        {{$users->appends($queryParams)->links()}}
    </div>
    @php }catch (Exception $exception){
     echo $exception->getMessage();
 }@endphp
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
