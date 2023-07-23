<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestOrders;
use App\Models\Orders;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::with('status')->orderBy('id', 'desc')->get();
        return view('backend.pages.orders.orders', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        return view('backend.pages.orders.create');
    }

    public function store(RequestOrders $request)
    {
        try{
            Orders::create($request->validated());
            flash()->addSuccess('Order created Successfully!!');
        }catch(Exception $exception)
        {
            flash()->addError('There was an issue saving your information.');
        }
        return redirect()->back();
    }

    public function trackOrders()
    {
        return view('backend.pages.order-details.details');
    }

    public function destroy(Orders $order)
    {
        try{
            $order->delete();
            flash()->addSuccess('Order deleted Successfully!!');
        }catch(Exception $exception)
        {
            flash()->addError('There was an issue deleting your information.');
        }
        return redirect()->back();
    }
}
