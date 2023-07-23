<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestOrders;
use App\Models\Orders;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::with(['status' => function($query) {
            $query->latest()->get();
        }])->orderBy('id', 'desc')->get();

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

    public function trackOrders(Request $request)
    {

        $datas = [];
        if($request->inlineRadioOptions == 'option1')
        {
            $datas = Orders::with('status')->whereBooking_no($request->search)->first();
        }
        if($request->inlineRadioOptions == 'option2')
        {
            $datas = Orders::with('status')->whereBl_no($request->search)->first();
        }
        return view('backend.pages.order-details.details', ['datas' => $datas]);
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
