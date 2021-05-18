<?php $dashboard = '';
$submitRequest = '';
$assets = '';
$requester = '';
$workreport = '';
$sellreport = 'active';
$technician = '';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Confirm SELL')
@section('container')
    <div class="col-sm-9 col-md-10 mt-5 text-center">
        @if (Session::has('msg'))
            <p class="alert alert-danger s_flash">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ url('Admin/Sell_Report_Search') }}" method="POST" class="d-print-none">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="date" name="start_date" class="form-control">
                </div>
                <span class="mt-2 mx-3">TO</span>
                <div class="form-group col-md-2">
                    <input type="date" name="end_date" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit" name="search">Search <i
                            class="fas fa-search ml-1"></i></button>
                </div>
            </div>
        </form>

        @if (isset($_POST['search']))
            @if (isset($result[0]))
                <p class="bg-dark p-2 text-white font-weight-bold mt-4">Product/Parts detail</p>
                <table class="table responsive">
                    <thead>
                        <tr>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price Each</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $item)
                            <tr>
                                <td class="pt-4">{{ $item->c_id }}</td>
                                <td class="pt-4">{{ $item->c_name }}</td>
                                <td class="pt-4">{{ $item->c_add }}</td>
                                <td class="pt-4">{{ $item->c_pname }}</td>
                                <td class="pt-4">{{ $item->c_pquantity }}</td>
                                <td class="pt-4">{{ $item->c_peach }}</td>
                                <td class="pt-4">{{ $item->c_ptotal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="text-center btn btn-danger d-print-none" onclick="window.print()">Print <i class="fas fa-print ml-1"></i></p>
            @else
                <p class="alert alert-warning s_flash">No assets in the inventory !</p>
            @endif
        @endif

    </div>
    <style>
        .s_flash {
            margin-bottom: 0.5rem !important;
            margin-top: -1rem !important;
            /* padding: 0rem !important; */
            font-size: 1rem !important;
        }

    </style>
@endsection
