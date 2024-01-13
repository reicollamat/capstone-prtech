<x-notification-alert>
    {{ session('notification') }}
</x-notification-alert>

<h5 class="border-bottom border-secondary pb-2 mb-4">Account Details</h5>
<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <tbody>
                    <tr>
                        <td scope="row">Name:</td>
                        <td>
                            <div class="row d-flex justify-content-center">
                                <x-text-input id="first_name" name="first_name" type="text" class="col-6 mx-2 border"
                                    :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name"
                                    style="max-width: 45%" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                <x-text-input id="last_name" name="last_name" type="text" class="col-6 mx-2 border"
                                    :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name"
                                    style="max-width: 45%" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Username:</td>
                        <td>
                            <div>
                                <x-text-input id="name" name="name" type="text" class="block w-full"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">E-mail:</td>
                        <td>
                            <div>
                                <x-text-input id="email" name="email" type="text" class="block w-full"
                                    :value="old('email', $user->email)" required autofocus autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Active Address:</td>
                        <td>
                            <div>
                                <x-text-input id="address" name="address" type="text" class="block w-full"
                                    :value="old(
                                        'address',
                                        $user->street_address_1 . ', ' . $user->city . ', ' . $user->country,
                                    )" required autofocus autocomplete="address" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex items-center gap-4">
                <button class="flex w-fit no-underline decoration-0 text-light" type="submit">
                    <span
                        class="lg:!h-10 h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-4 border border-blue-600 bg-blue-600 hover:bg-white hover:text-blue-600 transition duration-500 ease-in-out">
                        Save Changes
                    </span>
                </button>

            </div>
        </div>
    </div>
</form>
<div class="w-full flex justify-center my-3">
    @if (!Auth::user()->email_verified_at)
        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
            @csrf
            <span class="font-base text-center text-red-500">
                Account is not yet verified. Please check your Email for a verification link.
                <br>
                Or <button type="submit" class="font-black text-blue-500">Click here </button> to resend verification
                email.
            </span>
        </form>
        {{-- Account is not yet verified. Please <a href="{{ route('verification.send') }}">click here</a> to resend verification email. --}}
    @endif
</div>
<div class="card mt-2">
    <div class="card-body">
        <section>
            <header>
                <h6 class="">Update Password</h6>

                <p class="text-sm text-secondary">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </header>

            <form method="post" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                @method('put')

                <div>
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" name="current_password" type="password" class="block w-full"
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="block w-full"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                        class="block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <button class="flex w-full no-underline decoration-0 text-light" type="submit">
                        <span
                            class="lg:!h-10 h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-4 border border-blue-600 bg-blue-600 hover:bg-white hover:text-blue-600 transition duration-500 ease-in-out">
                            Update
                        </span>
                    </button>
                </div>
            </form>
        </section>
    </div>
</div>
<section class="m-2 mx-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="flex w-full no-underline decoration-0 text-light" type="submit" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        <span
            class="lg:!h-10 h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-4 border border-red-600 bg-red-600 hover:bg-white hover:text-red-600 transition duration-500 ease-in-out">
            Delete Account
        </span>
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
