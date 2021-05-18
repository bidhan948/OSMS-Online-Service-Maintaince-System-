<?php $dashboard = '';
$submitRequest = '';
$assets = '';
$requester = '';
$workreport = '';
$sellreport = '';
$technician = '';
$workoffer = 'active';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Work Order')
@section('container')
    <div class="col-sm-9 col-md-10 mt-5">
        <form class="form-horizontal form-label-left" method="POST"
            action="{{ url('Admin/work_update/' . $result[0]->req_id) }}">
            @csrf
            <div class="form-group row ">
                <label class="control-label col-md-2 col-sm-3 mt-0 float-right" style="font-size: 1.2rem;">Choose Action?</label>
                <div class="col-md-6 col-sm-9 ">
                    <select name="work_status" class="form-control">
                        <option value="1">Pending</option>
                        <option value="2">Success</option>
                    </select>
                </div>
                <button class="btn btn-info ml-3 drop_submit" type="submit" name="submit">Submit</button>
            </div>

            <style>
                .s_flash {
                    margin-bottom: 0.5rem !important;
                    margin-top: -1.8rem !important;
                    /* padding: 0rem !important; */
                    font-size: 1rem !important;
                }

            </style>
        @endsection
