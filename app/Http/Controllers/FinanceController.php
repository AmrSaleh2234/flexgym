<?php

namespace App\Http\Controllers;

use App\Models\revenue;
use App\Models\subscription;
use App\Models\Trainee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    private function finance()
    {
        $revenue = 0;
        $deserved_amount = 0;
        $fitness = 0;
        $fitnessAndBurn = 0;
        $burn = 0;
        $women = 0;
        $data = Trainee::where('end_date', '>=', Carbon::today('EET'))->get();
        foreach ($data as $item) {
            $revenue += $item->payed;
            $deserved_amount += $item->not_payed;
            if ($item->program == 0)
                $fitness++;
            elseif ($item->program == 2)
                $fitnessAndBurn++;
            elseif ($item->program == 1)
                $burn++;
            else
                $women++;
        }
        return array($revenue, $deserved_amount, $fitness, $burn, $fitnessAndBurn, $women);
    }

    public function index()
    {
        list($revenue, $deserved_amount, $fitness, $burn, $fitnessAndBurn, $women) = $this->finance();
        return view('finance.index', compact('revenue', 'deserved_amount', 'fitness', 'burn', 'fitnessAndBurn', 'women'));
    }

    public function financeDate(Request $request)
    {

        list($revenue, $deserved_amount, $fitness, $burn, $fitnessAndBurn, $women) = $this->finance();
        if($request->end_date<$request->start_date)
        {
            $temp=$request->start_date;
            $request->start_date=$request->end_date;
            $request->end_date=$temp;
        }
        $data = revenue::whereDate('created_at', '>=', $request->start_date)->whereDate('created_at', '<=', $request->end_date)->get();
        $subscriptions = subscription::whereDate('created_at', '>=', $request->start_date)->whereDate('created_at', '<=', $request->end_date)->get();
        $revenue2 = 0;
        $deserved_amount2 = 0;
        $fitness2 = 0;
        $fitnessAndBurn2 = 0;
        $burn2 = 0;
        $women2 = 0;
        foreach ($data as $item) {
            $revenue2 += $item->amount;

        }
        foreach ($subscriptions as $item) {
            if ($item->program == 0)
                $fitness2++;
            elseif ($item->program == 2)
                $fitnessAndBurn2++;
            elseif ($item->program == 1)
                $burn2++;
            else
                $women2++;
        }

        $start = $request->start_date;
        $end = $request->end_date;
        return view('finance.index', compact('revenue', 'deserved_amount',
            'revenue2', 'deserved_amount2', 'start', 'end',
            'fitness', 'burn', 'fitnessAndBurn', 'women',
            'fitness2', 'burn2', 'fitnessAndBurn2', 'women2'));
    }

    public function day()
    {

        $start = Carbon::createFromTimeString('10:00');
        $end = Carbon::createFromTimeString('03:00')->addDay();
        $revenues = revenue::whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end)->get();
        return view('finance.day',compact('revenues'));

    }
}
