<?php

namespace App\Orchid\Screens\UserData;

use App\Models\Payment;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use App\Orchid\Layouts\UserData\PurchaseItemsListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PurchaseItemsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Purchase $purchase): iterable
    {
        $purchase_items = PurchaseItem::where('purchase_id', $purchase->id)
            ->get();
        $payment = Payment::where('purchase_id', $purchase->id)
            ->get()->first();

        return [
            'purchase_items' => $purchase_items,
            'payment' => $payment,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        // get current page url
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = 'https://';
        } else {
            $url = 'http://';
        }
        // Append the host(domain name, ip) to the URL.
        $url .= $_SERVER['HTTP_HOST'];
        // Append the requested resource location to the URL
        $url .= $_SERVER['REQUEST_URI'];

        // Use parse_url() function to parse the URL
        // and return an associative array which
        // contains its various components
        $url_components = parse_url($url);
        // Use parse_str() function to parse the
        // string passed via URL
        parse_str($url_components['query'], $params);

        $title_name = 'Purchase No. '.$params['purchase'].': Details';

        return $title_name;
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        // get current page url
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = 'https://';
        } else {
            $url = 'http://';
        }
        // Append the host(domain name, ip) to the URL.
        $url .= $_SERVER['HTTP_HOST'];
        // Append the requested resource location to the URL
        $url .= $_SERVER['REQUEST_URI'];

        // Use parse_url() function to parse the URL
        // and return an associative array which
        // contains its various components
        $url_components = parse_url($url);
        // Use parse_str() function to parse the
        // string passed via URL
        parse_str($url_components['query'], $params);

        // dd($params['user']);

        return [
            Link::make(__('Back'))
                ->icon('bs.back')
                ->route('platform.userdata.purchase', $params['user']),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::split([
                PurchaseItemsListLayout::class,
                Layout::view('admin.payment'),
            ]),
        ];
    }
}
