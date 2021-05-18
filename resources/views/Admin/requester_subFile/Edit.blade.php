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
    <div class="col-sm-9 col-md-6 mt-5 text-center jumbotron mx-5">
        @if (Session::has('msg'))
            <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
        @endif
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Update Requester Detail</p>
        <form action="{{ url('Admin/Requester_update/') }}" method="POST" class="mx-5">
            @csrf
            @if (Session::has('msg'))
                <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
            @endif
            <div class="form-group">
                <label for="id" class="font-weight-bold">Requester ID</label>
                <input type="text" name="id" id="id" class="form-control" value="{{$result[0]->id}}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$result[0]->name}}">
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Name</label>
                <input type="email" name="email" id="email" class="form-control" value="{{$result[0]->email}}">
            </div>
            <button type="submit" class="btn btn-danger" name="update">Update</button>
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
