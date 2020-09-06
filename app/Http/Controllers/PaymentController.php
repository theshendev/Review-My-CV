<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $token = "59c4f6acff3e8bd4d2a54756526c1b9653fec28dc47d6208a766cbff156e20c6";
        $args = [
            "amount" => 1000,
//            "amount" => $request->amount,
            "returnUrl" => "http://127.0.0.1:8000/payment/verify",
            "clientRefId" => uniqid(),
        ];

        $payment = new \PayPing\Payment($token);

        try {
            $payment->pay($args);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        echo $payment->getPayUrl();
        return redirect($payment->getPayUrl());

    }

    public function verify()
    {
        $token = "59c4f6acff3e8bd4d2a54756526c1b9653fec28dc47d6208a766cbff156e20c6";

        $payment = new \PayPing\Payment($token);

        try {
            if($payment->verify($_GET['refid'], 1000)){
                return redirect(route('about'))->with('status.success','پرداخت با موفقیت انجام شد');
            }else{
                return redirect(route('about'))->with('status.failure','پرداخت با مشکل مواجه شد');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
