<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\products;
use App\Models\cart_item;
use App\Models\visitores;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $products = DB::table('products')->get();
        if (Auth::check()) {
            $total_cart_items = DB::table('cart_item')->where('user_id', '=', Auth::user()->id)->count();
        }

        return view('home/home', ['products' => $products]);
    }

    public function about(Request $request)
    {
        return view('home/navbar/about');
    }

    public function contact(Request $request)
    {
        return view('home/navbar/contact');
    }

    public function products_total(Request $request)
    {

        $all_products = DB::table('product')->get();
        return view('home.products.total_products', ['all_products' => $all_products]);
    }

    //product
    public function single_product($id)
    {
        $prods = DB::table('product')->where('prod_id', $id)->get();
        return view('home.products.single_product', ['product' => $prods]);
    }


    public function show_single_product($id)
    {
        $prod = product::findOrFail($id);

        $related_products = DB::table('product')->where('prod_id', 2)->get();
        return view('home.products.show_single_product', ['prod' => $prod, 'related_products' => $related_products]);
    }
}
