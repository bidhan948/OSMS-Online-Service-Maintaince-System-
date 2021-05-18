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
@section('page_title', 'Requester page')
@section('container')
    <div class="col-sm-9 col-md-10 mt-5 text-center">
        @if (Session::has('msg'))
            <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
        @endif
        @if (isset($result[0]))
            <p class="bg-dark p-2 text-white font-weight-bold">List of Technician</p>
            <table class="table responsive">
                <thead>
                    <tr>
                        <th scope="col">Technician ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                        <tr>
                            <td>{{ $item->emp_id }}</td>
                            <td>{{ $item->emp_name }}</td>
                            <td>{{ $item->emp_city }}</td>
                            <td>{{ $item->emp_mobile }}</td>
                            <td>{{ $item->emp_email }}</td>
                            <td>
                                <form action="{{ url('Admin/Technician_action/' . $item->emp_id) }}" class="d-inline"
                                    method="POST">
                                    @csrf
                                    <button class="btn" name="update" style="font-size:1.2rem;"><i
                                            class="fas fa-edit text-info"></i></button>
                                    <button class="text-danger ml-4 btn" name="delete" style="font-size:1.2rem;"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-warning s_flash">No Technician found !</p>
        @endif
    </div>
    </div>
    <div class="float-right">
    <a href="{{url('Admin/Add_Technician')}}" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
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
