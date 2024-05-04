<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_address;
use App\Models\cart_item;
use App\Models\product;
use App\Models\products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\session;

class UserController extends Controller
{

    public function cart_user()
    {
        $cart_items = DB::table('cart_item')->where('user_id', '=', Auth::user()->id)->get();
        $sum_price = DB::table('cart_item')->where('user_id', '=', Auth::user()->id)->sum('price');

        return view('user/cart', ['cart_items' => $cart_items, 'sum_price' => $sum_price]);
    }

    public function add_item_to_cart(product $id)
    {

        $cart_item = new cart_item;
        $cart_item->create([
            'name' => $id->name,
            'quantity' => 1,
            'price' => $id->price,
            'category_id' => $id->prod_id,
            'prod_id' => $id->id,
            'user_id' => Auth::user()->id,
            'image' => $id->main_image,
        ]);

        if ($cart_item) {
            return 'success';
        } else {
            return 'failed';
        }
    }

    public function buy_now(product $id)
    {

        $product = product::find($id);

        return view('user/buy_now', ['product' => $product]);
    }

    public function user_account()
    {

        $user_address = DB::table('user_addresses')->where('user_id', '=', Auth::user()->id)->get();

        $user_address_id = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('id');

        $user_name = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('name');

        $user_phonenumber = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('phonenumber');

        $pincode = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('pincode');

        $address_type = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('address_type');

        $address = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('address');

        $state = DB::table('user_addresses')
            ->where('user_id', '=', Auth::user()->id)
            ->value('state');



        $names = $user_address->pluck('name');

        return view('user/user_account', [
            'user_address' => $user_address, 'name' => $user_name,
            'phonenumber' => $user_phonenumber, 'state' => $state, 'pincode' => $pincode, 'address_type' => $address_type,
            'address' => $address, 'names' => $names, 'user_address_id' => $user_address_id,
        ]);
    }

    public function update_address(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'state' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'address_type' => 'required'
        ]);

        $update_address = user_address::findOrFail($request->input('user_id'));

        $update_address->update([
            'name' => $request->input('name'),
            'phonenumber' => $request->input('phonenumber'),
            'state' => $request->input('state'),
            'address' => $request->input('address'),
            'pincode' => $request->input('pincode'),
            'address_type' => $request->input('address_type'),
        ]);

        if ($update_address) {
            dd('success');
        } else {
            dd('failed');
        }
    }


    public function login()
    {
        if (Auth::check()) {

            $user = Auth::user();

            if ($user->position == 'admin') {

                return redirect(route('dashboard.index'));
            } elseif ($user->position  == 'customer') {

                return redirect(route('home.index'));
            }
        }

        return view('user/login');
    }

    public function loginDB(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Retrieve only the 'email' and 'password' fields from the request
        $userlogin = $request->only('email', 'password');

        // Attempt to authenticate the user using the provided credentials
        if (Auth::attempt($userlogin)) {
            // If authentication is successful, retrieve the authenticated user
            $user = Auth::user();

            // Check the user's position
            if ($user->position == 'admin') {
                // If the user is an admin, redirect to the dashboard
                return redirect(route('dashboard.index'));
            } elseif ($user->position == 'customer') {

                // If the user is a customer, redirect to the home page
                return redirect(route('home.index'));
            }
        }

        // If authentication fails or the user's position is not recognized, redirect back with an error message
        return back()->with('error', 'Invalid credentials or unauthorized access.');
    }

    public function sign_out()
    {
        session::flush();
        auth::logout();
        return redirect()->route('login.index');
    }

    public function register()
    {
        return view('user/reigester');
    }

    public function registerDB(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $date = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $userDate = User::Create($date);

        if (!$userDate) {
            return back()->with('error', 'Something went wrong');
        }

        return redirect(route('login.index'))->with('success', 'User created successfully');
    }

    public function customers()
    {
        $customers = DB::table('users')->get();
        $totalUsers = User::count();
        return view('user/customers', ['customers' => $customers, 'userDB' => $totalUsers]);
    }

    public function single_customer($id)
    {

        $user = User::find($id);

        return view('user/single-customer', ['user' => $user]);
    }
}
