<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    function Request_display()
    {
        $results = DB::table('assign_work')
            ->RightJoin('submit_request', 'submit_request.req_id', '=', 'assign_work.req_id')
            ->latest('submit_request.req_id')
            ->get();
        return View('/Admin/Request', ['results' => $results]);
    }


    function Request_show(Request $r, $id)
    {
        if (isset($_POST['view'])) {
            $results = DB::table('submit_request')->get();
            $result = DB::table('submit_request')
                ->where('req_id', $id)
                ->get();
            return view('Admin/Request', ['result' => $result], ['results' => $results]);
        }

        if (isset($_POST['remove'])) {
            if (DB::table('submit_request')
                ->where('req_id', $id)
                ->delete()
            ) {
                $r->session()->flash('msg', "Request ID : $id  is Dumped sucessfully  ");
                return redirect('Admin/Dashboard');
            } else {
                echo 'Unable to delete';
            }
        }
    }
    function Assign_work(Request $r)
    {
        if (isset($_POST['assign'])) {
            $r->validate([
                'date' => 'required',
                'tech' => 'required'
            ]);
            $data = array(
                'req_id' => $r->input('id'),
                'work_status' => 1,
                'ref_id' => $r->input('ref_id'),
                'request_info' => $r->input('requestinfo'),
                'req_desc' => $r->input('requestdesc'),
                'request_name' => $r->input('name'),
                'request_add1' => $r->input('address1'),
                'request_add2' => $r->input('address2'),
                'request_city' => $r->input('city'),
                'request_state' => $r->input('state'),
                'request_zip' => $r->input('zip'),
                'request_email' => $r->input('email'),
                'request_mobile' => $r->input('mobile'),
                'request_date' => $r->input('date'),
                'technician' => $r->input('tech')
            );
            DB::table('assign_work')->insert($data);
            $r->session()->flash('msg', 'Technician has been successfully Assigned');
            return redirect('/Admin/Dashboard');
        }
    }

    function PrintandDumb(Request $r, $id)
    {
        $result = DB::table('assign_work')
            ->where('req_id', $r->input('req_id'))
            ->get();
        return view('/Admin/Print_page', ['result' => $result]);
    }

    function Change_password(Request $r)
    {
        $r->validate(
            ['password' => 'required',
            'Confirm_password'=> 'required'],

            ['password.required' => 'Sorry Password cannot be empty',
             'Confirm_password.required'=>'Sorry Confirm Password field cannot be empty']
        );

        $password = $r->input('password');
        $Confirm_password = $r->input('Confirm_password');
        $email = $r->input('email');

        if ($password === $Confirm_password) {

            $data = array(
                'password' => $Confirm_password
            );

            DB::table('registration')
                ->where('email', $email)
                ->update($data);

            $r->session()->flash('msg', 'Your Password is Sucessfully Updated');

            return view('Admin/ChangePassword');
        } else {
            $r->session()->flash('msg', 'Sorry your Password didnt match');
            return view('Admin/ChangePassword');
        }
    }

    function Logout(Request $r)
    {
        $r->session()->forget('admin_id');
        $r->session()->forget('admin_email');
        $r->session()->forget('admin_name');

        $r->session()->flash('msg', 'Successfully logged out');

        return redirect('/login');
    }
}
