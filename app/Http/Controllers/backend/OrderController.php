<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestOrders;
use App\Models\CurrentPort;
use App\Models\Orders;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Orders::with('currentPort')->with(['status' => function($query) {
            $query->latest()->get();
        }])->orderBy('id', 'desc')->get();
//        dd($orders);
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


    public function currentPort(Request $request)
    {
        try{
            $currentPort = CurrentPort::where('orders_id', $request->orders_id)->first();

            if ($currentPort) {
                $currentPort->update([
                    'current_port' => $request->current_port
                ]);
            }else{
                CurrentPort::create([
                    'orders_id' => $request->orders_id,
                    'current_port' => $request->current_port
                ]);
            }

            flash()->addSuccess('Port set Successfully!!');
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
            $datas = Orders::with('status', 'currentPort')->whereBooking_no($request->search)->first();
        }
        if($request->inlineRadioOptions == 'option2')
        {
            $datas = Orders::with('status', 'currentPort')->whereBl_no($request->search)->first();
        }
        if($request->inlineRadioOptions == 'option3')
        {
            $datas = Orders::with('status', 'currentPort')->whereContainer_no($request->search)->first();
        }

        return view('backend.pages.order-details.details', ['datas' => $datas, 'request' => $request]);
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
