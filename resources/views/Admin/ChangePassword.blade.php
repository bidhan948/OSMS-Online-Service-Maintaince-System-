<?php $dashboard = '';
$submitRequest = '';
$assets = '';
$requester = '';
$workreport = '';
$sellreport = '';
$technician = '';
$workoffer = '';
$changepassword = 'active';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Change Password')
@section('container')
    <div class="col-sm-6 mt-5">
        <form action="{{ url('Admin/ChangePasswordSubmit') }}" method="POST" class="mx-5">
            @csrf
            @if (Session::has('msg'))
                <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
            @endif
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ session('admin_email') }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="Password" class="font-weight-bold">New Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <p class="my-1 mb-2" style="color:red;">
                    @error('password')
                        {{ $message }}
                    @enderror
            </div>
            </p>
            <div class="form-group">
                <label for="co_Password" class="font-weight-bold">Confirm New Password</label>
                <input type="password" name="Confirm_password" id="co_password" class="form-control">
                <p class="my-1 mb-2" style="color:red;">
                    @error('Confirm_password')
                        {{ $message }}
                    @enderror
            </div>

            <button type="submit" class="btn btn-danger" name="submit">Update</button>
        </form>
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
