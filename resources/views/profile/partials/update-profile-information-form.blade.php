<div class="container">
    <header>
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profile Information
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">User name</label>
            <input type="text" class="form-control" placeholder="Username" aria-label="username" name="username" value="{{$user->username}}">
            <x-input-error class="mt-2" :messages="$errors->get('username')" />

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first_name" value="{{$user->first_name}}">
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />

            </div>
            <div class="col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Last name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"name="last_name" value="{{$user->last_name}}">
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />

            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$user->email}}">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-grid col-2">
            <button type="submit" class="btn btn-primary flex items-center gap-4">save</button>
        </div>
    </form>

</div>
