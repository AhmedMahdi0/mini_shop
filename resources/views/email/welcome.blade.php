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
                            <h1>Hello {{$name}},</h1>
                            <p>We're excited to have you on board. Here are a few things you can do:</p>
                            <ul>
                                <li>Complete your profile</li>
                                <li>Explore our services</li>
                                <li>Connect with other users</li>
                            </ul>
                            <p>If you have any questions, feel free to contact our support team.</p>
                            <p>Thank you for your attention.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.dashboardComponent.footer')
