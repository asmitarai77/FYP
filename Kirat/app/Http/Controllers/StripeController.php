<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function stripePyament(Request $req)
    {
        // print_r($req->all());
        // die();
        // dd($req->price);
        // $price = $req->price / 100;
        $price = $req->price;
        // dd($price);

        // dd($price);

        Stripe\Stripe::setApiKey('sk_test_51MxJMxELVwFvRKb6X8iP3TyNoKUOQOXaH1hp3Rq0YHD18pjhDY4Q1zCeKFJChzXIiv274RtsDI88oxjqqH9Bjm3300zgNkFQxj');
        $data = Stripe\Charge::create([
            "amount" => $price * 100,
            "currency" => "usd",
            "source" => $req->stripeToken,
            "description" => "Payment of shopping"
        ]);
        echo "<pre>";
        // print_r($data);
        // die();

        // Session::flash("succes_message", "Payment successfully!");

        Session::forget('cart');

        return redirect()->route('index')->with('success_message', "Paymemnt Successfully Done");
    }
}
