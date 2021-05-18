<?php $dashboard = '';
$submitRequest = '';
$assets = '';
$requester = '';
$workreport = '';
$sellreport = '';
$technician = 'active';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Add Technician')
@section('container')
    <div class="col-sm-9 col-md-6 mt-5 jumbotron mx-5">
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Add Technician</p>
        <form action="{{ url('Admin/Insert_technician/') }}" method="POST" class="mx-5">
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="city" class="font-weight-bold">City</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>
            <div class="form-group">
                <label for="mobile" class="font-weight-bold">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control">
            </div>
            <button type="submit" class="btn btn-info" name="update">Submit</button>
        </form>

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
