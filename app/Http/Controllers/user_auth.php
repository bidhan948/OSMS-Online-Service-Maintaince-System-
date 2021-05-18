<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class user_auth extends Controller
{
    function name_update(Request $r)
    {
        $r->validate([
            'name' => 'required'
        ]);
        $data = array(
            'name' => $r->input('name')
        );
        DB::table('registration')
            ->where('id', session('user_id'))
            ->update($data);

        $r->session()->flash('msg', 'Updated Successfully');

        return redirect('/user/dashboard');
    }

    function ChangePassword(Request $r)
    {
        $r->validate([
            'password' => 'required',
        ]);
        $data = array(
            'password'=>$r->input('password')
        );
        DB::table('registration')
            ->where('id', session('user_id'))
            ->update($data);

        $r->session()->flash('msg', 'Password Changed Successfully');

        return redirect('/user/dashboard');
    }

    function userlogout(Request $r)
    {
        $r->session()->forget('user_id');
        $r->session()->forget('user_email');
        $r->session()->forget('user_name');
        $r->session()->forget('req');

        $r->session()->flash('msg', 'Logged out successfully');

        return redirect('/login');
    }
}
