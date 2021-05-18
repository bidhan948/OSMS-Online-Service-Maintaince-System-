<?php $dashboard = '';
$submitRequest = '';
$assets = 'active';
$requester = '';
$workreport = '';
$sellreport = '';
$technician = '';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Confirm SELL')
@section('container')
    <div class="col-sm-9 col-md-6 jumbotron mx-5">
        @if (Session::has('msg'))
            <p class="alert alert-danger s_flash">{{ Session::get('msg') }}</p>
        @endif
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Products Detail</p>
        <div class=" <?php if (isset($data['p_id'])) {
            echo 'jumbotron';
        } ?>">
            <table class="table">
                <tbody>
                    @if (isset($data['p_id']))
                        <tr>
                            <th scope="row">Product ID :</th>
                            <td class="float-left">{{ $data['p_id'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Customer's Name :</th>
                            <td>{{ $data['c_name']}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Customer's address</th>
                            <td>{{ $data['c_add'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Product name :</th>
                            <td>{{ $data['c_pname'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Product Quantity :</th>
                            <td>{{ $data['c_pquantity'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Product Cost :</th>
                        <td>{{$data['cp_each']}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total :</th>
                            <td>{{ $data['c_ptotal'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of purchase</th>
                            <td>{{ $data['c_pdate'] }}</td>
                        </tr>
                       <tr>
                            <th scope="row">
                                <form action="{{ url('Admin/Confirm_sell_product/') }}" method="POST" class="d-inline">
                                    @csrf
                                        <input type="text" name="id" id="id" class="form-control" value="{{ $data['p_id'] }}" hidden>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $data['c_pname'] }}" hidden>
                                        <input type="text" name="c_name" id="c_name" class="form-control" value="{{$data['c_name']}}" hidden>
                                        <input type="text" name="c_add" id="c_add" class="form-control" value="{{$data['c_add']}}" hidden>
                                        <input type="text" name="p_cost" id="p_cost" class="form-control" value="{{$data['cp_each']}}" hidden>
                                        <input type="text" name="p_quantity" id="p_quantity" class="form-control" value="{{$data['c_pquantity']}}" hidden>
                                        <input type="date" name="date" id="date" class="form-control" value="{{$data['c_pdate']}}" hidden>
                                        <input type="text" name="c_ptotal"  class="form-control" value="{{$data['c_ptotal']}}" hidden>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success d-print-none" name="Confirm">Confirm <i class="fas fa-handshake ml-1"></i></button>
                                        <a class="btn btn-info d-print-none ml-3" name="Print " onclick="window.print()">Print <i class="fas fa-print ml-1"></i></a>
                                    <a href="{{url('Admin/Assets')}}" class="btn btn-danger ml-3 d-print-none" name="close">Cancel <i class="fas fa-times ml-1"></i></a>
                                    </div>
                                </form>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
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
