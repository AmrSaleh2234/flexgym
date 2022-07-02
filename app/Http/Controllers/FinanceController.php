<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $revenue=0;
        $deserved_amount =0;
        $data = Trainee::where('end_date','>=',Carbon::today('EET'))->get();
        foreach ($data as $item)
        {
            $revenue+=$item->payed;
            $deserved_amount+=$item->not_payed;
        }
        return view('finance.index',compact('revenue','deserved_amount'));
    }
}
