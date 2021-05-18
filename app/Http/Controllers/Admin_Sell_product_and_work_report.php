<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_Sell_product_and_work_report extends Controller
{
    function sell_product_search(Request $r)
    {
        $r->validate([
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $from = $r->input('start_date');
        $to = $r->input('end_date');

        $result = DB::table('customer')
            ->whereBetween('c_pdate', [$from, $to])
            ->get();

        return view('Admin/SellReport', ['result' => $result]);
    }
    function work_report_search(Request $r)
    {
        $from = $r->input('start_date');
        $to = $r->input('end_date');

        if ($from == "" || $to == "") {
            $r->session()->flash('msg', 'Please Enter Both the date');
            return view('Admin.WorkReport');
        } else {
            $result = DB::table('assign_work')
                ->whereBetween('request_date', [$from, $to])
                ->get();

            return view('Admin/WorkReport', ['result' => $result]);
        }
    }
}
