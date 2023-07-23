<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        try{
            OrderStatus::create([
                'orders_id' => $request->orders_id,
                'title' => $request->title,
                'description' => $request->description,
                'time' => Carbon::now()
            ]);
            flash()->addSuccess('Status Added Successfully!!');
        }catch(Exception $exception)
        {
            flash()->addError('There was an issue saving your information.');
        }
        return redirect()->back();
    }
}
