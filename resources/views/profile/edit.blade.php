@include('dashboard.dashboardComponent.dashboard-nav')
<div class="body-wrapper">
    <div class="bg-light-info mt-2 pt-2 pb-3">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="bg-light-info mt-2 pt-2 pb-3">
        @include('profile.partials.update-password-form')
    </div>

    <div class="bg-light-info mt-2 pt-2 pb-3">
        @include('profile.partials.delete-user-form')
    </div>


</div>
</div>
@include('dashboard.dashboardComponent.footer')
