@include('dashboard.dashboardComponent.footer')
<div class="page-wrapper">
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{route('dashboard')}}"
                               class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{url('dashbord/assets/images/logos/dark-logo.svg')}}" width="180" alt="">
                            </a>
                            <p class="text-center">Your Social Campaigns</p>

                            <form action="{{url('email/send')}}" method="post">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email">
                                </div>
                                <input class="btn-outline-dark btn" type="submit" value="Send Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                <x-input-error :messages="session('message')" class="mt-2"/>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('dashboard.dashboardComponent.dashboard-nav')

