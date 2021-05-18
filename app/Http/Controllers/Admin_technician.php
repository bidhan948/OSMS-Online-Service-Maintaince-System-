<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_technician extends Controller
{
    function technician_action(Request $r, $id)
    {
        if (isset($_POST['update'])) {
            $result = DB::table('technician')->where('emp_id', $id)->get();
            return view('Admin/technician_Subfile.Edit', ['result' => $result]);
        }
        if (isset($_POST['delete'])) {
            DB::table('technician')
                ->where('emp_id', $id)
                ->delete();
            $r->session()->flash('msg', 'Technician account has been succesfully Removed');

            return redirect('Admin/Technician');
        }
    }
    function update(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'mobile' => 'required'
        ]);

        $id = $r->input('id');

        $data = array(
            'emp_name' => $r->input('name'),
            'emp_email' => $r->input('email'),
            'emp_city'=> $r->input('city'),
            'emp_mobile'=> $r->input('mobile')
        );
        DB::table('technician')
            ->where('emp_id', $id)
            ->update($data);

        $r->session()->flash('msg', 'Technicians has been updated successfully');

        return redirect('Admin/Technician');
    }

    function insert(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'email' => 'required|unique:registration', 
            'city'=>'required',
            'mobile'=>'required'
        ]);
        $data = array(
            'emp_name' => $r->input('name'),
            'emp_email' => $r->input('email'),
            'emp_city'=> $r->input('city'),
            'emp_mobile'=> $r->input('mobile')
        );
        DB::table('technician')->insert($data);
        $r->session()->flash('msg', 'Technician Account created succesully');
        return redirect('/Admin/Dashboard');
    }
}
