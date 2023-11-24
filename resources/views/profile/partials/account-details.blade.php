<h5 class="border-bottom border-secondary pb-2 mb-4">Account Details</h5>

<table class="table table-bordered align-middle">
    <tbody>
        <tr>
            <td scope="row">Name:</td>
            <td>
                <div>
                    <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->first_name.' '.$user->last_name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </td>
        </tr>
        <tr>
            <td scope="row">Username:</td>
            <td>
                <div>
                    <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </td>
        </tr>
        <tr>
            <td scope="row">E-mail:</td>
            <td>
                <div>
                    <x-text-input id="email" name="email" type="text" class="block w-full" :value="old('email', $user->email)" required autofocus autocomplete="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
            </td>
        </tr>
        <tr>
            <td scope="row">Active Address:</td>
            <td>
                <div>
                    <x-text-input id="address" name="address" type="text" class="block w-full" :value="old('address', $user->street_address_1.', '.$user->city.', '.$user->country)" required autofocus autocomplete="address" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>
            </td>
        </tr>
        <tr>
            <td scope="row" class="align-top pt-3">Password:</td>
            <td class="px-4">
                @include('profile.partials.update-password-form')
            </td>
        </tr>
    </tbody>
</table>