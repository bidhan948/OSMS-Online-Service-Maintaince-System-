<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class User extends Controller
{

    function submitRequest(Request $r)
    {
        if (isset($_POST['submit'])) {
            $r->validate([
                'requestinfo' => 'required',
                'requestdesc' => 'required',
                'name' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'date' => 'required'
            ]);
            $data = array(
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
            );
            DB::table('submit_request')->insert($data);
            $r->session()->put('req', 'is_login');
            $r->session()->flash('msg', 'Your Request has been successfully sent');
            return redirect('/user/RequestSucess/');
        }
    }

    function RequestSucess(Request $r)
    {
        if (session('req') == 'is_login') {
            $result = DB::table('submit_request')
                ->latest('req_id')
                ->limit(1)
                ->get();
            return view('/user/RequestSucess', ['result' => $result]);
        } else {
            $r->session()->flash('msg', 'Sorry the requested page doesnt exist !');
            return redirect('/login');
        }
    }

    function search(Request $r)
    {
        $ref_id = $r->input('ref_id');
        if ($ref_id == "") {
            $r->session()->flash('msg', 'No results found !');
            return view('user/CheckStatus');
        } else {
            $result = DB::table('assign_work')
                ->where('ref_id', $ref_id)
                ->get();
            if (isset($result[0])) {
                $r->session()->put('ref_id','ref_id');
                return view('user/CheckStatus', ['result'=> $result] );
            }else{  
                $r->session()->flash('msg','No Results Found');
                return view('/user/CheckStatus');
            }
        }
    }

    function print(Request $r)
    {
        $r->session()->forget('req');
        return redirect('/user/dashboard');
    }
}
