<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profile(Request $request): View
    {
        // dd($request->is_mypurchase);
        if ($request->is_mypurchase) {
            // if route from "my purchase" button
            $is_mypurchase = $request->is_mypurchase;
        } else {
            $is_mypurchase = 0;
        }
        $user = $request->user();
        $purchases = collect($user->purchase);
        $pending = $purchases->where('purchase_status', 'pending');
        // dd(count($user->purchase));

        return view('profile.profile', [
            'user' => $user,
            'pending' => $pending,
            'is_mypurchase' => $is_mypurchase,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('notification', 'Profile Updated!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
