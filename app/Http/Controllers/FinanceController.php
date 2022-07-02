<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    private function finance()
    {
        $revenue=0;
        $deserved_amount =0;
        $data = Trainee::where('end_date','>=',Carbon::today('EET'))->get();
        foreach ($data as $item)
        {
            $revenue+=$item->payed;
            $deserved_amount+=$item->not_payed;
        }
        return array($revenue,$deserved_amount);
    }
    public function index()
    {
        list($revenue,$deserved_amount)=$this->finance();
        return view('finance.index',compact('revenue','deserved_amount'));
    }

    public function financeDate(Request $request)
    {
        list($revenue,$deserved_amount)=$this->finance();
        $data = Trainee::whereBetween('start_date',[$request->start_date,$request->end_date])
            ->orWhereBetween('end_date',[$request->start_date,$request->end_date])
            ->orWhereBetween('end_date',[$request->end_date,$request->start_date])
            ->orWhereBetween('start_date',[$request->end_date,$request->start_date])
            ->get();
        $revenue2=0;
        $deserved_amount2 =0;
        foreach ($data as $item)
        {
            $revenue2+=$item->payed;
            $deserved_amount2+=$item->not_payed;
        }
        $start = $request->start_date;
        $end = $request->end_date;
        return view('finance.index',compact('revenue','deserved_amount','revenue2','deserved_amount2','start','end'));
    }
}
