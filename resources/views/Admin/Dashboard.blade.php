<?php $dashboard = 'active';
$submitRequest = '';
$assets = '';
$requester = '';
$workreport = '';
$sellreport = '';
$technician = '';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', "Admin's Dashboard")
@section('container')
    <div class="col-sm-9 col-md-10 mt-5">
        @if (Session::has('msg'))
            <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
        @endif
        <div class="row text-center mx-3">
            <div class="col-sm-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Requests Recieved</div>
                    <div class="card-body">
                    <h4 class="card-title">
                        @if ($data['result_request'] != 0)
                            {{$data['result_request']}}
                        @else
                            0
                        @endif
                    </h4>
                        <a href="" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">No. of Technician</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            @if ($data['result_technician'] != 0)
                                {{$data['result_technician']}}
                            @else
                                0
                            @endif
                        </h4>
                        <a href="" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Assigned Work</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            @if ($data['result_assign_work'] != 0)
                                {{$data['result_assign_work']}}
                            @else
                                0
                            @endif
                        </h4>
                        <a href="" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-5 mt-5 text-center">
            <p class="bg-dark text-white font-20 font-weight-bold py-2">List of requester</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Requester ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
