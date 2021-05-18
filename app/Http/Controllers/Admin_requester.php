<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_requester extends Controller
{
    function requester_action(Request $r, $id)
    {
        if (isset($_POST['update'])) {
            $result = DB::table('registration')->where('id', $id)->get();
            return view('Admin/requester_subFile.Edit', ['result' => $result]);
        }
        if (isset($_POST['delete'])) {
            DB::table('registration')
                ->where('id', $id)
                ->delete();
            $r->session()->flash('msg', 'Requester account has been succesfully Deleted');

            return redirect('Admin/Requester');
        }
    }
    function update(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $name = $r->input('name');
        $email = $r->input('email');
        $id = $r->input('id');

        $data = array(
            'name' => $name,
            'email' => $email
        );

        DB::table('registration')
            ->where('id', $id)
            ->update($data);

        $r->session()->flash('msg', 'Requester has been updated successfully');

        return redirect('Admin/Requester');
    }

    function insert(Request $r)
    {
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
        $r->session()->flash('msg', 'Requester Account Created Succesfully');
        return redirect('/Admin/Dashboard');
    }
}
