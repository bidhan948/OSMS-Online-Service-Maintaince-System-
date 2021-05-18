<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_assets extends Controller
{
    function assets_action(Request $r, $id)
    {
        if (isset($_POST['update'])) {
            $result = DB::table('assets')->where('p_id', $id)->get();
            return view('Admin/assets_subfile.Edit', ['result' => $result]);
        }
        if (isset($_POST['delete'])) {
            DB::table('assets')
                ->where('p_id', $id)
                ->delete();
            $r->session()->flash('msg', 'Product has been succesfully Removed');

            return redirect('Admin/Assets');
        }
        if (isset($_POST['sell'])) {
            $result = DB::table('assets')->where('p_id', $id)->get();
            return view('Admin.Assets_subfile.Sell_Product', ['result' => $result]);
        }
    }
    function update(Request $r)
    {
        if (isset($_POST['update'])) {
            $id = $r->input('id');
            if (
                $r->input('name') == "" ||
                $r->input('date') == "" ||
                $r->input('available') == "" ||
                $r->input('total') == "" ||
                $r->input('total') == "" ||
                $r->input('Oprice') == "" ||
                $r->input('Sprice') == ""
            ) {
                $r->session()->flash('msg', 'Please Fill all the fields');
                $result = DB::table('assets')->where('p_id', $id)->get();
                return view('Admin/assets_subfile.Edit', ['result' => $result]);
            }
            $data = array(
                'p_name' => $r->input('name'),
                'p_dop' => $r->input('date'),
                'p_available' => $r->input('available'),
                'p_total' => $r->input('total'),
                'p_orginalprice' => $r->input('Oprice'),
                'p_sellingprice' => $r->input('Sprice')
            );
            DB::table('assets')
                ->where('p_id', $id)
                ->update($data);

            $r->session()->flash('msg', 'Products detail has been updated successfully');

            return redirect('Admin/Dashboard');
        }
    }

    function insert(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'date' => 'required',
            'available' => 'required',
            'total' => 'required',
            'Ocost' => 'required',
            'Scost' => 'required'
        ]);
        $data = array(
            'p_name' => $r->input('name'),
            'p_dop' => $r->input('date'),
            'p_available' => $r->input('available'),
            'p_total' => $r->input('total'),
            'p_orginalprice' => $r->input('Ocost'),
            'p_sellingprice' => $r->input('Scost')
        );
        DB::table('assets')->insert($data);
        $r->session()->flash('msg', 'Products have been succesfully added');
        return redirect('/Admin/Dashboard');
    }

    function sell_product(Request $r)
    {
        $id = $r->input('id');
        if (
            $r->input('name') == "" ||
            $r->input('c_name') == "" ||
            $r->input('c_add') == "" ||
            $r->input('date') == "" ||
            $r->input('available') == "" ||
            $r->input('p_quantity') == "" ||
            $r->input('p_cost') == ""
        ) {
            $r->session()->flash('msg', 'Please Fill all the fields');
            $result = DB::table('assets')->where('p_id', $id)->get();
            return view('Admin/Assets_subfile.Sell_Product', ['result' => $result]);
        }

        $p_quantity = $r->input('p_quantity');
        $p_cost = $r->input('p_cost');
        $total = $p_quantity * $p_cost;

        $data = array(
            'p_id' => $r->input('id'),
            'c_name' => $r->input('c_name'),
            'c_pname' => $r->input('name'),
            'c_pdate' => $r->input('date'),
            'c_add' => $r->input('c_add'),
            'cp_each' => $r->input('p_cost'),
            'c_ptotal' => $total,
            'c_pquantity' => $r->input('p_quantity'),
        );

        return view('Admin.Assets_subfile.Confirm_sell', ['data' => $data]);
    }

    function confirm_sell_product(Request $r)
    {
        $data = array(
            'p_id' => $r->input('id'),
            'c_name' => $r->input('c_name'),
            'c_pname' => $r->input('name'),
            'c_pdate' => $r->input('date'),
            'c_add' => $r->input('c_add'),
            'c_peach' => $r->input('p_cost'),
            'c_ptotal' => $r->input('c_ptotal'),
            'c_pquantity' => $r->input('p_quantity'),
        );

        $available_asset = DB::table('assets')
            ->where('p_id', $r->input('id'))
            ->get();
        $r_quantity =  $available_asset[0]->p_available - $r->input('p_quantity');

        if ($r_quantity >= 0) {
            if (DB::table('customer')->insert($data)) {

                DB::table('assets')
                    ->where('p_id', $r->input('id'))
                    ->update(['p_available' => $r_quantity]);

                $r->session()->flash('msg', 'Successfully sold' . $available_asset[0]->p_name);

                return redirect('Admin/Assets');
            }
        } else {
            $r->session()->flash('msg', 'Out of stock !');
            return redirect('Admin/Assets');
        }
    }
}
