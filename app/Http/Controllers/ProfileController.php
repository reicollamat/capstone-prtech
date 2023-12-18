<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ItemReturnrefundInfo;
use App\Models\Purchase;
use App\Models\PurchaseCancellationInfo;
use App\Models\PurchaseItem;
use App\Models\ReturnrefundImage;
use App\Models\Shipments;
use App\Models\User;
use App\Models\UserNotification;
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
        // dd($request->profile_activetab);
        if ($request->profile_activetab) {
            // if route from "my purchase" button
            $profile_activetab = $request->profile_activetab;
        } else {
            $profile_activetab = 0;
        }
        $user = $request->user();
        // dd(count($user->purchase));

        return view('profile.profile', [
            'user' => $user,
            'profile_activetab' => $profile_activetab,
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

        return Redirect::route('profile.edit', ['profile_activetab' => 'purchases'])->with('notification', 'Cancellation for Order #' . $purchase->reference_number . ' requested!');
    }

    /**
     * Request return/refund of order
     */
    public function request_returnrefund(Request $request): RedirectResponse
    {
        // dd($request->condition);
        $request->validate([
            'evidence_imgs.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $user = User::find($request->user_id);
        $purchase_item = PurchaseItem::find($request->purchase_item_id);
        $img_path = null;

        // save a new database returnrefund info
        $returnrefund_info = new ItemReturnrefundInfo([
            'purchase_item_id' => $purchase_item->id,
            'user_id' => $user->id,
            'seller_id' => $purchase_item->purchase->seller_id,
            'item_quantity' => $request->item_quantity,
            'request_date' => now(),
            'status' => 'returnrefund-pending',
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
                    'real_public'
                );

                $returnrefund_img = new ReturnrefundImage([
                    'item_returnrefund_info_id' => $returnrefund_info->id,
                    'user_id' => $user->id,
                    'img_path' => $img_path,
                ]);
                $returnrefund_img->save();
            }
        }

        return Redirect::route('profile.edit', ['profile_activetab' => 'purchases'])->with('notification', 'Return/Refund requested for ' . $purchase_item->product->title . '!');
    }

    public function cancel_returnrefund_request(Request $request): RedirectResponse
    {
        // dd($request->item_returnrefund_id);
        ItemReturnrefundInfo::destroy($request->item_returnrefund_id);

        return Redirect::route('profile.edit', ['profile_activetab' => 'returnrefund'])->with('notification', 'Return/Refund request cancelled!');
    }

    public function confirm_returnrefund(Request $request): RedirectResponse
    {
        // dd($request->item_returnrefund_id);
        $refund_item = ItemReturnrefundInfo::find($request->item_returnrefund_id);

        $refund_item->update([
            'status' => 'returnrefund-approved',
            'agreement_date' => now(),
        ]);

        return Redirect::route('profile.edit', ['profile_activetab' => 'returnrefund'])->with('notification', 'Approved to Return/Refund Agreement!');
    }

    public function shipping_returnrefund(Request $request): RedirectResponse
    {
        // dd($request->item_returnrefund_id);
        $refund_item = ItemReturnrefundInfo::find($request->item_returnrefund_id);

        $refund_item->update([
            'status' => 'returnrefund-shipping',
        ]);

        return Redirect::route('profile.edit', ['profile_activetab' => 'returnrefund'])->with('notification', 'Approved to Return/Refund Agreement!');
    }

    public function replacement_arrived(Request $request): RedirectResponse
    {
        // dd($request->item_returnrefund_id);
        $refund_item = ItemReturnrefundInfo::find($request->item_returnrefund_id);

        $refund_item->update([
            'status' => 'returnrefund-completed',
            'completion_date' => now(),
        ]);

        return Redirect::route('profile.edit', ['profile_activetab' => 'returnrefund'])->with('notification', 'Replacement Completed!');
    }

    public function refundcompleted_returnrefund(Request $request): RedirectResponse
    {
        // dd($request->item_returnrefund_id);
        $refund_item = ItemReturnrefundInfo::find($request->item_returnrefund_id);

        $refund_item->update([
            'status' => 'returnrefund-completed',
            'completion_date' => now(),
        ]);

        return Redirect::route('profile.edit', ['profile_activetab' => 'returnrefund'])->with('notification', 'Completed Return/Refund Request!');
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

    public function updateOrderStatus(Request $request): RedirectResponse
    {
        // dd($request->purchase_id);

        $id = $request->purchase_id;

        if ($id) {
            $purchase = Purchase::find($id);
            $purchase->update([
                'purchase_status' => 'completed',
                'completion_date' => now(),
            ]);

            $shipment = Shipments::where('purchase_id', $id)->first();
            $shipment->update([
                'shipment_status' => 'completed',
                'shipped_date' => now(),
            ]);

            if ($shipment->purchase->payment->payment_type == 'cod') {
                $shipment->purchase->payment->update([
                    'payment_status' => 'paid',
                    'date_of_payment' => now(),
                ]);
            }

            //notify from 'shipping' to 'completed'
            $notification = new UserNotification([
                'user_id' => $shipment->purchase->user->id,
                'purchase_id' => $shipment->purchase->id,
                'tag' => 'completed',
                'title' => 'Share your feedback!',
                'message' => 'Order #' . $shipment->purchase->id . ' is completed. Your feedback matters to others! Rate the products by date',
            ]);
            $notification->save();
        }
        //
        else {
            return abort(500);
        }

        return Redirect::route('profile.edit', ['profile_activetab' => 'purchases']);
    }
}
