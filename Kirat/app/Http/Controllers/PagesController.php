<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Categorys;
use App\Models\Contacts;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Product;

class PagesController extends Controller
{
    //
    public function index()
    {
        $blog = Blogs::all();
        $category = Categorys::all();
        $products = Products::take(8)->latest()->get();
        return view('frontend.pages.index', compact('blog', 'category', 'products'));
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function tour()
    {
        return view('frontend.pages.tour');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function product()
    {   $category = Categorys::all();
        $product = Products::take(9)->latest()->get();
        // dd($product);
        return view('frontend.pages.product', compact('product','category'));
    }
    public function blog_single($id)
    {
        $blog_single = Blogs::find($id);
        return view('frontend.pages.favourite-places', compact('blog_single'));
    }
    public function contact_store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = Contacts::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,


        ]);
        $contact->save();
        return redirect()->back();
    }

    public function cart()
    {
        return view('frontend.pages.cart');
    }

    public function product_details($id)
    {
        $product = Products::find($id);
        return view('frontend.pages.product-details', compact('product'));
    }



    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->title,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }


    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function checkout(Request $request)
    {
        return view('frontend.pages.checkout');
    }

    public function place_order(Request $request)
    {

        // dd('here');
        $userId = Auth::guard('user')->user()->id;
        $buy_product = new Orders();
        $buy_product->user_id = $request->user_id;
        $buy_product->product = json_encode(session('cart'));
        $buy_product->price = $request->price;
        $buy_product->quantity = $request->quantity;

        // dd($buy_product);
        $buy_product->save();

        // dd($buy_product);



        $order = new ShippingAddress();
        $order->order_id = $buy_product->id;
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->city = $request->city;
        $order->save();
        return redirect()->route('stripe');
    }

    public function stripe()
    {
        return view('frontend.pages.stripe');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if ($request->category != "" && $request->price == "") {
            $category = Categorys::all();

            $product = Products::where('category_id', $request->category)->get();
            // dd($product);
            return view('frontend.pages.search', compact('product', 'category'));
        } elseif ($request->price != "" && $request->category == "") {
            $category = Categorys::all();
            return view('frontend.pages.search', compact('product', 'category'));

            // dd($product);
            return view('frontend.pages.search', compact('product'));
        } elseif ($request->category != "" && $request->price != "") {
            $category = Categorys::all();
            # code...

            $product = Products::where('price', '<=', $request->price)->where('category_id', $request->category)->get();
            // dd($product);
            return view('frontend.pages.search', compact('product', 'category'));
        } else {
            return "No product Found";
        }
    }
}
