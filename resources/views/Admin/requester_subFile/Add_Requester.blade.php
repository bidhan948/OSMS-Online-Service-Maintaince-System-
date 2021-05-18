<?php $dashboard = '';
$submitRequest = '';
$assets = '';
$requester = 'active';
$workreport = '';
$sellreport = '';
$technician = '';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Requester page')
@section('container')
    <div class="col-sm-9 col-md-6 mt-5 jumbotron mx-5">
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Update Requester Detail</p>
        <form action="{{ url('Admin/Insert_requester/') }}" method="POST" class="mx-5">
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
                <label for="password" class="font-weight-bold">Password</label>
                <input type="password" name="password" id="password" class="form-control">
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
