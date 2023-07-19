<div class="container">
    <header>
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Update Password
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')


        <div class="col-md-12 mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" placeholder="current password" aria-label="current_password" name="current_password" >
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

        </div>
        <div class="col-md-12 mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" placeholder="new password" aria-label="password" name="password" >
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

        </div>
        <div class="col-md-12 mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" placeholder="password confirmation" aria-label="password_confirmation" name="password_confirmation" >
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

        </div>

        <div class="d-grid col-2">
            <button type="submit" class="btn btn-primary flex items-center gap-4">save</button>
        </div>
    </form>

</div>

