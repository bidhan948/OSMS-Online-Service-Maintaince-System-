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
        @if (Session::has('msg'))
            <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
        @endif
        @if (isset($result))
            <table class="table">
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
                        <th scope="col">Action</th>
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
                                @if($item->work_status == 1)
                                    <span class="text-danger font-weight-bold p-2 bg-light  rounded">Pending <i class="fas fa-clock ml-1"></i></span>
                                @else
                                    <span class="text-success bg-light font-weight-bold p-2 rounded">Success <i class="fas fa-check-double ml-1 text-success"></i></span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ url('Admin/Print_work/' . $item->req_id) }}" method="POST"
                                    class="d-flex">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->req_id }}">
                                    <button class="btn btn-warning" name="view" type="submit"><i
                                            class="far fa-eye"></i></button>
                                    <a href="{{url('Admin/Work_status/'.$item->req_id)}}" class="btn btn-warning ml-1">Choose action</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger mt-5">No assigned work has found</div>
        @endif
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
