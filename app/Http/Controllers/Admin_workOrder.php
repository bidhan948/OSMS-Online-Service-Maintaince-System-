<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class Admin_workOrder extends Controller
{

    function Print_work(Request $r, $id)
    {
        $result = DB::table('assign_work')
            ->where('req_id', $r->input('id'))
            ->get();
        return view('/Admin/workorder_sub_file/Print_work', ['result' => $result]);
    }

    function work_status(Request $r, $id)
    {
        $result = DB::table('assign_work')
            ->where('req_id', $id)
            ->get();

        return view('/Admin/workorder_sub_file/workorder_chooseaction', ['result' => $result]);
    }

    function work_update(Request $r, $id)
    {
        $work_status = $r->input('work_status');
        $data = array(
            'work_status' => $work_status
        );

        DB::table('assign_work')
            ->where('req_id', $id)
            ->update($data);
        $r->session()->flash('msg', 'Work status has been successfully updated');

        return redirect('Admin/Dashboard');
    }
}
