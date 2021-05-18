<?php $dashboard = 'active';
$submitRequest = '';
$checkstatus = '';
$changepassword = '';
$logout = '';
?>
@extends('user/layout')
@section('page_title', Session('user_name') . ' Dashboard')
@section('container')
    <div class="col-sm-9 mt-5">
        <form action="{{ url('user/search') }}" method="POST" class="mx-5 form-inline d-print-none">
            @csrf
            <div class="form-group">
                <label for="ref_id" class="ml-2">Enter Reference ID</label>
                <input type="text" name="ref_id" id="ref_id" class="form-control mx-2">
            </div>
            <button type="submit" class="btn btn-danger" name="search">Search</button>
        </form>
        @if (Session::has('msg'))
            <p class="alert alert-success s_flash d-print-none">{{ Session::get('msg') }}</p>
        @endif
        <div class="mt-5 <?php if (isset($result[0]->req_id)) {
                echo 'jumbotron';
            } ?>">
            <table class="table">
                <tbody>
                    @if (isset($result[0]->req_id))
                        <tr>
                            <th scope="row">Request ID :</th>
                            <td class="float-left">{{ $result[0]->req_id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Request info</th>
                            <td>{{ $result[0]->request_info }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Request Description</th>
                            <td>{{ $result[0]->req_desc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $result[0]->request_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address Line 1</th>
                            <td>{{ $result[0]->request_add1 }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address Line 2</th>
                            <td>{{ $result[0]->request_add2 }}</td>
                        </tr>
                        <tr>
                            <th scope="row">city</th>
                            <td>{{ $result[0]->request_city }}</td>
                        </tr>
                        <tr>
                            <th scope="row">State</th>
                            <td>{{ $result[0]->request_state }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile</th>
                            <td>{{ $result[0]->request_mobile }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Zip</th>
                            <td>{{ $result[0]->request_zip }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $result[0]->request_email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Assigned Date</th>
                            <td>{{ $result[0]->request_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Technician Name</th>
                            <td>{{ $result[0]->technician }}</td>
                        </tr>
                        <tr>
                            <th scope="row"> <button class="btn btn-danger d-print-none" onclick="window.print()">Print</button></th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
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
