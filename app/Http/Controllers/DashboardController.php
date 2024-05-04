<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\products;
use App\Models\visitores;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $total_customer = DB::table('users')->where('position', 'customer')->count();
        return view('dashboard/dashboard', ['total_customer' => $total_customer]);
    }

    public function massages()
    {
        return view('dashboard/massages');
    }

    public function categories()
    {

        $products = DB::table('products')->get();
        return view('dashboard\products\categories ', ['products' => $products]);
    }

    public function show_single_category($id)
    {

        $categories = products::find($id);
        return view('dashboard\products\show_single_Category ', ['Category' => $categories]);
    }

    public function edit_single_category(Request $request)

    {

        $formType = $request->input('form_type');

        if ($formType == 'form1') {

            $image_update = products::findOrFail($request->input('id'));

            if (!$image_update) {
                return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
            }

            $image = $request->file('image');

            if ($image) {
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('images'), $image_name);
                $image_update->image = 'images/' . $image_name;
            }

            if ($image_update->save()) {
                return response()->json(['success' => true, 'message' => 'Product updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update Product. Please try again.'], 500);
            }
        } elseif ($formType == 'form2') {

            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $update_Product = products::findOrFail($request->input('id'));

            $update_Product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);

            if ($update_Product->update()) {
                return response()->json(['success' => true, 'message' => 'Product Category successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update Category pleace full all fild.'], 500);
            }
        }
    }


    public function add_products(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'Main_image' => 'required',
        ]);

        $Insert_Product = new products();
        $Insert_Product->name = $request->input('name');
        $Insert_Product->description = $request->input('description');

        $imgName = 'main_' . uniqid() . '_' . $request->Main_image->getClientOriginalName();
        $imgPath_1 = $request->Main_image->move(public_path('images'), $imgName);
        $Insert_Product->image = 'images/' . $imgName;

        if ($Insert_Product->save()) {
            return response()->json(['success' => true, 'message' => 'Product added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to add Product the product.'], 500);
        }
    }


    public function delete_Products(Request $request, $id)
    {
        try {
            $products = Products::findOrFail($id);
            $products->delete();
            return response()->json(['success' => true, 'message' => 'your  is Product  deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed eeeeeee delete the product.'], 500);
        }
    }

    public function view_single_product($products)
    {

        $prods = DB::table('product')->where('prod_id', $products)->get();


        if ($prods) {
            return view('dashboard/products/products', ['prod_id' => $products, 'product' => $prods]);
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function add_single_product(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'Available_Quantity' => 'required|numeric|gt:0',
            'description' => 'required',
            'price' => 'required',
            'Main_image' => 'required',
            'Additional_image' => 'required',
        ]);

        $Insert_Product = new product();
        $Insert_Product->prod_id = $request->input('prod_type');
        $Insert_Product->name = $request->input('name');
        $Insert_Product->price = $request->input('price');
        $Insert_Product->description = $request->input('description');
        $Insert_Product->available_Quantity = $request->input('Available_Quantity');

        $imgName_1 = 'main_' . uniqid() . '_' . $request->Main_image->getClientOriginalName();
        $imgPath_1 = $request->Main_image->move(public_path('images'), $imgName_1);
        $Insert_Product->main_image = 'images/' . $imgName_1;

        $imgName_2 = 'additional_' . uniqid() . '_' . $request->Additional_image->getClientOriginalName();
        $imgPath_2 = $request->Additional_image->move(public_path('images'), $imgName_2);
        $Insert_Product->additional_image = 'images/' . $imgName_2;

        if ($Insert_Product->save()) {
            return response()->json(['success' => true, 'message' => 'Product added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to add Product pleace full all fild.'], 500);
        }
    }

    public function delete_single_product(Request $request, $id)
    {
        $product = product::find($id);

        try {
            $products = Product::findOrFail($id);
            $products->delete();
            return response()->json(['success' => true, 'message' => ' Product  deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to  delete the product.'], 500);
        }
    }

    public function view_Product(product $id)

    {
        return view('dashboard/products/view_single_product', ['id' => $id]);
    }

    public function edit_single_product(Request $request)

    {

        $formType = $request->input('form_type');

        if ($formType == 'form1') {
            $update_Product_img = product::find($request->input('id'));

            // Retrieve the file objects
            $main_img = $request->file('main-img');
            $additional_img = $request->file('additional-img');

            $update_data = [];

            // Handle the main image
            if ($main_img) {
                $main_img_name = $main_img->getClientOriginalName(); // Get the original file name
                $main_img->move(public_path('images'), $main_img_name); // Store the file in storage/app/public/images folder
                $update_data['main_image'] = 'images/' . $main_img_name; // Use = for assignment instead of ==
            }

            // Handle the additional image
            if ($additional_img) {
                $additional_img_name = $additional_img->getClientOriginalName(); // Get the original file name
                $additional_img->move(public_path('images'), $additional_img_name); // Store the file in storage/app/public/images folder
                $update_data['additional_image'] = 'images/' . $additional_img_name; // Use = for assignment instead of ==
            }

            $update_Product_img->update($update_data);
            if ($update_Product_img->update()) {
                return response()->json(['success' => true, 'message' => 'Product update successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update Product pleace try again.'], 500);
            };
        } elseif ($formType == 'form2') {

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'available_Quantity' => 'required|numeric|gt:0',
                'price' => 'required|numeric|gt:0',
            ]);

            $update_Product = product::find($request->input('id'));

            $update_Product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'available_Quantity' => $request->input('available_Quantity'),
                'price' => $request->input('price'),
            ]);

            if ($update_Product->update()) {
                return response()->json(['success' => true, 'message' => 'Product updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update Product pleace full all fild.'], 500);
            }
        }
    }
}
