<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Requests;
use App\Helpers\Utm;
use App\Models\ProductMapping;

/**
 * Class FunnelController
 * @package App\Http\Controllers
 */
class FunnelController extends Controller
{
    const cookieLifetime = 30;

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        // array to hold user data
        $userData = [];

        // see if a utm was passed
        $utm = ($request->input('utm') !== null) ? $request->get('utm') : null;

        // if utm validates
        if(!is_null($utm) && Utm::validateUtm($utm))
        {
            $userData['utm'] = strtolower($utm);
            Cookie::queue('userData', json_encode($userData), self::cookieLifetime);
        }

        // store the incoming request
        $requests = new Requests;
        $requests->ip_address = $request->ip();
        $requests->user_agent = $request->header('User-Agent');
        $requests->query_string = $request->getRequestUri();
        $requests->save();

        // return a redirect to welcome page
        return redirect()->action([self::class, 'welcome']);
    }

    /**
     * @return mixed
     */
    public function welcome()
    {
        // return a response to view welcome page
        return response()->view('pages.welcome');
    }

    /**
     * @return mixed
     */
    public function ageAndPriceRange()
    {
        // return a response to view age & price range page
        return response()->view('pages.ageAndPriceRange');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeAgeAndPriceRange(Request $request)
    {
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'userAge'=>'required|numeric',
            'userPriceRange'=>'required|numeric'
        ]);

        // if validation fails
        if ($validator->fails())
        {
            // redirect to same page with errors and input
            return redirect(route('pages.ageAndPriceRange'))
                ->withErrors($validator)
                ->withInput();
        }

        // update userData cookie adding userAge and userPriceRange
        $userData = json_decode(Cookie::get('userData'),true);
        $userData['userAge'] = $request->userAge;
        $userData['userPriceRange'] = $request->userPriceRange;
        Cookie::queue('userData', json_encode($userData), self::cookieLifetime);

        // return a redirect to marital status page
        return redirect()->action([self::class, 'maritalStatus']);
    }

    /**
     * @return mixed
     */
    public function maritalStatus()
    {
        // if userData cookie is set
        if(Cookie::has('userData'))
        {
            // get userData from cookie
            $userData = json_decode(Cookie::get('userData'),true);

            // if userData has userAge and userPriceRange keys
            if (array_key_exists('userAge', $userData) &&
                array_key_exists('userPriceRange', $userData))
            {
                // return a response to marital status page
                return response()->view('pages.maritalStatus');
            }
        }

        // return a redirect to index page because the user does not have userData
        return redirect()->action([self::class, 'index']);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeMaritalStatus(Request $request)
    {
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'userMaritalStatus'=>'required|numeric',
        ]);

        // if validation fails
        if ($validator->fails())
        {
            // redirect to same page with errors and input
            return redirect(route('pages.maritalStatus'))
                ->withErrors($validator)
                ->withInput();
        }

        // update userData cookie adding userMaritalStatus
        $userData = json_decode(Cookie::get('userData'),true);
        $userData['userMaritalStatus'] = $request->userMaritalStatus;
        Cookie::queue('userData', json_encode($userData), self::cookieLifetime);

        // return a redirect to product offers page
        return redirect()->action([self::class, 'productOffers']);
    }

    /**
     * @return mixed
     */
    public function productOffers()
    {
        // if userData cookie is set
        if(Cookie::has('userData'))
        {
            // get userData from cookie
            $userData = json_decode(Cookie::get('userData'),true);

            // if userData has userAge, userPriceRange and userMaritalStatus keys
            if (array_key_exists('userAge', $userData) &&
                array_key_exists('userPriceRange', $userData) &&
                array_key_exists('userMaritalStatus', $userData))
            {
                // create var to hold our products
                $products = null;

                // assign the cookie data to usable vars
                $userAge = $userData['userAge'];
                $userPriceRange = $userData['userPriceRange'];
                $userMaritalStatus = $userData['userMaritalStatus'];

                // set up conditions
                $conditions =  ['age' => $userAge, 'marital_status' => $userMaritalStatus];

                // query product mapping table
                switch($userPriceRange)
                {
                    // userPriceRange is less than 50k
                    case 1:
                        $products = ProductMapping::where($conditions)->join('products', function ($join) {
                            $join->on('product_mapping.product_id', '=', 'products.id')
                                ->where('products.price', '<', 50000);
                        })->get();

                        break;
                    // userPriceRange is more than 50k
                    case 2:
                        $products = ProductMapping::where($conditions)->join('products', function ($join) {
                            $join->on('product_mapping.product_id', '=', 'products.id')
                                ->where('products.price', '>=', 50000);
                        })->get();
                        break;
                    default:
                        $products = null;
                        break;
                }

                // if there were products found
                if($products->count() > 0)
                {
                    // return a response to product offers page and include the products that we found
                    return response()->view('pages.productOffers', compact('products'));
                }
            }
        }

        // return a redirect to index page because the user does not have userData
        return redirect()->action([self::class, 'index']);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeProductOffers(Request $request)
    {
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'products'=>'required|array|min:1',
            'products.*'  => 'required|string|distinct|min:1',
        ]);

        // if validation fails
        if ($validator->fails())
        {
            // redirect to same page with errors and input
            return redirect(route('pages.productOffers'))
                ->withErrors($validator)
                ->withInput();
        }

        // create array to store our products
        $products = [];
        foreach($request->products as $product)
        {
            $products[] = $product;
        }

        // add products to its own cookie
        $products = json_encode($products);
        Cookie::queue('products', $products, self::cookieLifetime);

        // return a redirect to checkout controllers index page
        return redirect()->action([CheckoutController::class, 'index']);
    }
}
