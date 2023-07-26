<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $isSearch = false;
        $datas = [];
        if($request->inlineRadioOptions == 'option1')
        {
            $isSearch = true;
            $datas = Orders::with('status', 'currentPort')->whereBooking_no($request->search)->first();
        }
        if($request->inlineRadioOptions == 'option2')
        {
            $isSearch = true;
            $datas = Orders::with('status', 'currentPort')->whereBl_no($request->search)->first();
        }
        if($request->inlineRadioOptions == 'option3')
        {
            $isSearch = true;
            $datas = Orders::with('status', 'currentPort')->whereContainer_no($request->search)->first();
        }

        return view('welcome', ['datas' => $datas, 'request' => $request, 'isSearch' => $isSearch]);
    }
}
