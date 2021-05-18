<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class RegistrationandSubmit extends Controller
{
    function store(Request $r)
    {
        if (isset($_POST['rsignup'])) {
            $r->validate([
                'name' => 'required',
                'email' => 'required|unique:registration',
                'password' => 'required'
            ]);
            $data = array(
                'name' => $r->input('name'),
                'email' => $r->input('email'),
                'password' => $r->input('password'),
                'role' => 2
            );
            DB::table('registration')->insert($data);
            $r->session()->flash('msg', 'Account Created Succesfully');
            return redirect('/');
        }
    }

    function login()
    {
        return view('/login');
    }

    function LoginSubmit(Request $r)
    {

        if (isset($_POST['submit'])) {
            $r->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $result = DB::table('registration')
                ->where('email', $r->input('email'))
                ->where('password', $r->input('password'))
                ->get();

            if (isset($result[0]->id)) {
                if ($result[0]->role == 1) {
                    $r->session()->put('admin_id', $result[0]->id);
                    $r->session()->put('admin_email', $result[0]->email);
                    $r->session()->put('admin_name', $result[0]->name);

                    return redirect('Admin/Dashboard');
                } else {
                    $r->session()->put('user_id', $result[0]->id);
                    $r->session()->put('user_email', $result[0]->email);
                    $r->session()->put('user_name', $result[0]->name);

                    return redirect('user/dashboard');
                }
            } else {
                $r->session()->flash('msg', 'Please Enter valid login detail');
                return redirect('/login');
            }
        }
    }
}
