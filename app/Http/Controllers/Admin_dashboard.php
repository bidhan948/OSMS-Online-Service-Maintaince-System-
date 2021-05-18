<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_dashboard extends Controller
{
    function show_data(Request $r)
    {
        $result =  DB::table('registration')
            ->where('role', 2)
            ->get();

        $result_request = DB::table('submit_request')
            ->count('req_id');

        $result_technician = DB::table('technician')
            ->count('emp_id');

        $result_assign_work = DB::table('assign_work')
            ->count('a_id');

        $data = array(
            'result_request'=>$result_request,
            'result_technician'=>$result_technician,
            'result_assign_work'=>$result_assign_work
        );

        return view(
            'Admin/Dashboard',
            ['result' => $result],
            ['data'=>$data]
        );
    }
}
