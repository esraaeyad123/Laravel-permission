<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\OrderStarted ;
use App\Mail\OrderShipped;
use App\Mail\OrderCompleted;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function start(Request $request){

       Mail::to($request->user())->send(new OrderStarted);
        return "send";
    }
    public function ship(Request $request){
        Mail::to($request->user())->send(new OrderShipped($request->user()->name));

        return "emil ship";

    }

    public function complete(Request $request){
        Mail::to($request->user())->send(new OrderCompleted($request->user()->name));

        return "complete";

    }

}
