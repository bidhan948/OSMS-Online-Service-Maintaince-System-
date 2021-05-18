<?php $dashboard="active"; $submitRequest=""; $checkstatus=""; $changepassword=""; $logout="";  ?>
@extends('user/layout')
@section('page_title',Session('user_name'). ' Dashboard')
@section('container')
<div class="col-sm-6 mt-5">
    <form action="{{url('user/name_update')}}" method="POST" class="mx-5">
        @csrf
        @if(Session::has('msg'))
        <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
        @endif
        <div class="form-group">
            <label for="email" class="font-weight-bold">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{session('user_email')}}" readonly>
        </div>
        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{session('user_name')}}">
        </div>
        <button type="submit" class="btn btn-danger" name="update">Update</button>
    </form>
</div>
<style>
    .s_flash{
        margin-bottom: 0.5rem !important;
        margin-top: 0rem !important; 
        /* padding: 0rem !important; */
        font-size: 1rem !important;
    }    
</style>    
@endsection