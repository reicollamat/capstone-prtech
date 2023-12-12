<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseCancellationInfo;
use App\Models\PurchaseItem;
use App\Models\PurchaseReturnrefundInfo;
use App\Models\ReturnrefundImage;
use App\Models\User;
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
        // dd(count($user->purchase));

        return view('profile.profile', [
            'user' => $user,
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
     * Request cancellation of order
     */
    public function request_cancel_order(Request $request): RedirectResponse
    {
        $purchase = Purchase::find($request->purchase_id);
        $user = User::find($request->user_id);

        // dd($purchase->purchase_status);
        $cancellation = new PurchaseCancellationInfo([
            'purchase_id' => $purchase->id,
            'user_id' => $user->id,
            'seller_id' => $purchase->seller->id,
            'request_date' => now(),
        ]);
        $cancellation->save();
        $purchase->update(['purchase_status' => 'cancellation_pending']);


        return Redirect::route('profile.edit', ['is_mypurchase' => true])->with('notification', 'Cancellation requested!');
    }

    /**
     * Request return/refund of order
     */
    public function request_returnrefund(Request $request): RedirectResponse
    {
        $request->validate([
            'evidence_imgs.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        // dd($request->evidence_imgs);

        $user = User::find($request->user_id);
        $purchase_item = PurchaseItem::find($request->purchase_item_id);
        $img_path = null;


        // save a new database returnrefund info
        $returnrefund_info = new PurchaseReturnrefundInfo([
            'purchase_item_id' => $purchase_item->id,
            'user_id' => $user->id,
            'seller_id' => $purchase_item->purchase->seller_id,
            'request_date' => now(),
            'status' => 'returnrefund_pending',
            'reason' => $request->reason,
            'condition' => $request->condition,
        ]);
        $returnrefund_info->save();

        // loop through evidence images, store it, and save to database
        if ($request->has('evidence_imgs')) {
            foreach ($request->evidence_imgs as $key => $image) {
                $img_path = $image->storeAs(
                    'returnrefund_imgs',
                    $purchase_item->id . '-' . $key . '-' . 'returnrefund_img' . '.' . $image->getClientOriginalExtension(),
                    'public'
                );

                $returnrefund_img = new ReturnrefundImage([
                    'purchase_returnrefund_info_id' => $returnrefund_info->id,
                    'user_id' => $user->id,
                    'img_path' => $img_path,
                ]);
                $returnrefund_img->save();
            }
        }

        return Redirect::route('profile.edit', ['is_mypurchase' => true])->with('notification', 'Return/refund requested!');
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
