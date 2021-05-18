<?php $dashboard = '';
$submitRequest = '';
$assets = '';
$requester = '';
$workreport = 'active';
$sellreport = '';
$technician = '';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Work Report')
@section('container')
    <div class="col-sm-9 col-md-10 mt-5 text-center">
        <form action="{{ url('Admin/Work_report_search') }}" method="POST" class="d-print-none">
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
            @if (Session::has('msg'))
                <p class="alert alert-danger s_flash">{{ Session::get('msg') }}</p>
            @else
                @if (isset($result[0]))
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">Req ID</th>
                                <th scope="col">Req Info</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Technician</th>
                                <th scope="col">Assigned date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item)
                                <tr>
                                    <td>{{ $item->req_id }}</td>
                                    <td>{{ $item->request_info }}</td>
                                    <td>{{ $item->request_add1 }}</td>
                                    <td>{{ $item->request_city }}</td>
                                    <td>{{ $item->request_mobile }}</td>
                                    <td>{{ $item->technician }}</td>
                                    <td>{{ $item->request_date }}</td>
                                    <td>
                                        @if ($item->work_status == 1)
                                            <span class="text-danger font-weight-bold p-2 bg-light  rounded">Pending <i
                                                    class="fas fa-clock ml-1"></i></span>
                                        @else
                                            <span class="text-success bg-light font-weight-bold p-2 rounded">Success <i
                                                    class="fas fa-check-double ml-1 text-success"></i></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="mt-3 text-center btn btn-danger d-print-none" onclick="window.print()">Print <i class="fas fa-print ml-1"></i></p>
                @else
                    <div class="alert alert-danger mt-5">No assigned work has found</div>
                @endif

            @endif
        @endif
    </div>
    <style>
        .s_flash {
            margin-bottom: 0.5rem !important;
            margin-top: 1rem !important;
            /* padding: 0rem !important; */
            font-size: 1rem !important;
        }

    </style>
@endsection
