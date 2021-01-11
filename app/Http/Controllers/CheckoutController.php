<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Discounts;
use App\Helpers\IpAddress;
use App\Models\Upsells;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // see if cookies are set with given names
        if(Cookie::has('userData') && Cookie::has('products'))
        {
            // array to hold our products
            $productsArr = [];

            // array to hold discount amounts
            $discountAmounts = [];

            // var to hold the total percentage of discounts
            $discountPercentage = 0;

            // get userData from cookie
            $userData = json_decode(Cookie::get('userData'),true);

            // if userData has a key for utm
            if(array_key_exists('utm', $userData))
            {
                // set utm
                $utm = $userData['utm'];

                // see if we have a discount for provided utm
                $discount = Discounts::where('code', $utm)->get();

                // if there is a discount
                if($discount->count() > 0)
                {
                    // set the discount amount
                    $discountAmounts[] = $discount[0];
                }
            }

            // see if user is from northern hemisphere
            // because we offer a discount if they are
            $hemisphere = IpAddress::getHemisphereFromIpAddress($request->ip());

            if($hemisphere != null)
            {
                // see if we have a discount for provided hemisphere
                $discount = Discounts::where('code', $hemisphere)->get();

                // if there is a discount
                if($discount->count() > 0)
                {
                    // set the discount amount
                    $discountAmounts[] = $discount[0];
                }
            }

            // return the value of the cookie
            $productsArr = json_decode(Cookie::get('products'), true);

            if(count($productsArr) > 0)
            {
                // get all the products prices for calculation
                $products = Products::whereIn('id', $productsArr)->get();
                $subTotal = 0;
                $grandTotal = 0;

                // calculate the sub total
                foreach ($products as $product)
                {
                    $subTotal += $product->price;
                }

                // calculate the total in discounts
                foreach ($discountAmounts as $discount)
                {
                    $discountPercentage += $discount->amount_percentage;
                }

                // calculate amount to subtract for discount
                $amountToSubtract = $discountPercentage * $subTotal;

                // calculate discounts and return new total
                $grandTotal = $subTotal - $amountToSubtract;

                return response()->view('pages.checkout', compact(['products','subTotal','grandTotal','discountAmounts']));
            }
        }

        // return to start if no userData or products are set
        return redirect()->action([FunnelController::class, 'index']);
    }

    public function storeCheckout(Request $request)
    {
        $productsArr = [];

        // see if cookies are set with given names
        if(Cookie::has('userData') && Cookie::has('products'))
        {
            // thank you
            return redirect()->action([self::class, 'thankYou']);
        }

        // return to start if no userData or products are set
        return redirect()->action([FunnelController::class, 'index']);
    }

    public function thankYou()
    {
        // see if cookies are set with given names
        if(Cookie::has('userData') && Cookie::has('products')) {
            // var to hold our upsell product if there is one
            $upsellProduct = null;

            // get userData from cookie
            $userData = json_decode(Cookie::get('userData'), true);

            // if userData has a key for utm
            if (array_key_exists('utm', $userData)) {
                // set utm
                $utm = $userData['utm'];

                // see if we have an upsell for provided utm
                $upsell = Upsells::where('code', $utm)->get();

                // if there is an upsell for this utm
                if ($upsell->count() > 0)
                {
                    // return the value of the cookie
                    $productsArr = json_decode(Cookie::get('products'), true);

                    if(count($productsArr) > 0)
                    {
                        // grab a random product to upsell
                        // and ensure it wasn't a product that was just purchased
                        $upsellProduct = Products::whereNotIn('id', $productsArr)->inRandomOrder()->first();
                    }
                }
            }

            // unset our cookies
            Cookie::queue(Cookie::forget('userData'));
            Cookie::queue(Cookie::forget('products'));

            // return a response to thank you page
            return response()->view('pages.thankyou', compact(['upsellProduct']));
        }

        // return to start if no userData or products are set
        return redirect()->action([FunnelController::class, 'index']);
    }
}
