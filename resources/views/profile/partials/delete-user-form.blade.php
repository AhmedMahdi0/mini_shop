<div class="container">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')
        <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">
           Are you sure you want to delete your account?
        </h4>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
        </p>

        <div class="col-md-3 mb-3">
            <input type="password" class="form-control" placeholder="password" aria-label="password" name="password" >
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="d-grid col-2">
            <button type="submit" class="btn btn-danger">Delete Account</button>

        </div>
    </form>

</div>


