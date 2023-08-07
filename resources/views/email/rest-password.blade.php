@include('dashboard.dashboardComponent.header')
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{route('login')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{url('dashbord/assets/images/logos/dark-logo.svg')}}" width="180" alt="">
                            </a>
                            <p class="text-center">Your Social Campaigns</p>
                            <h1>Hello ,</h1>
                            <p>You are receiving this email because we received a password reset request for your account.</p>
                            <a href="{{$resetUrl}}" class="btn-outline-dark btn">Reset Password</a>
                            <br>
                            <br>
                            <p>If you did not request a password reset, no further action is required.</p>
                            <p>Thank you for your attention.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.dashboardComponent.footer')
