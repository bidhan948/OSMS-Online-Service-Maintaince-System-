<?php $dashboard = '';
$submitRequest = 'active';
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
<div class="col-sm-4 mb-5">
@if(isset($results))
    @foreach ($results as $item)
        @if(isset($item->a_id))
            <div class="card mt-5 mx-5">
                <div class="card-header">
                    <h4>Request ID: {{ $item->req_id }}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text pt-2 text-success text-center"><i class="fas fa-check-circle fa-3x"></i></p>
                <p class="card-text pt-2 text-success text-center">Sucessfully Technician({{$item->technician}}) assigned</p>
                    <div class=" d-flex Justify-content-center">
                        <form action="{{ url('Admin/PrintandDumb/' . $item->req_id) }}" method="POST" >
                            @csrf
                            <input type="hidden" value="{{ $item->req_id }}" name="req_id">
                            <div class="d-flex justify-content-center mt-3">  
                                <input type="submit" name="P_and_dumb" id="" value="Print & Dumb" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    @foreach ($results as $item)
        @if (!isset($item->a_id))
            <div class="card mt-5 mx-5">
                <div class="card-header">
                    <h4>Request ID: {{ $item->req_id }}</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Request Info : {{ $item->request_info }}</h5>
                    <p class="card-text">{{ $item->req_desc }}</p>
                    <p class="card-text">Request date: {{ $item->request_date }}</p>
                    <div class="float-right">
                        <form action="{{ url('Admin/Request_view/' . $item->req_id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->req_id }}" name="req_id">
                            <input type="submit" name="view" id="" value="view" class="btn btn-danger mr-3">
                            <input type="submit" name="remove" id="" value="Remove" class="btn btn-secondary">
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@else
    <div class="bg-light s_flash text-center alert alert-danger">No Request Found !!!!</div>
@endif
</div>

<div class="col-sm-5 mt-5 jumbotron">
    <form action="{{url('Admin/Assign_Work')}}" method="POST">
        @csrf
        <h5 class="text-center">Assign Work Order Requests</h5>
        <div class="form-group">
            <label for="id">Request ID</label>
            <input type="text" class="form-control" id="id" name="id"
                value="@if(isset($result[0]->req_id)) {{$result[0]->req_id }} @endif" readonly>
        </div>
        <div class="form-group">
            <label for="inputrequestinfo">Request info</label>
            <input type="text" class="form-control" id="inputrequestinfo" placeholder="Request info"
                value="@if(isset($result[0]->req_id)) {{$result[0]->request_info }} @endif" name="requestinfo" readonly>
            <p class="my-1" style="color:red;">

            </p>
        </div>
        <div class="form-group">
            <label for="inputrequestdescription">Description</label>
            <input type="text" class="form-control" id="inputrequestdescription" placeholder="write Description"
                value="@if(isset($result[0]->req_id)) {{$result[0]->req_desc }} @endif" name="requestdesc" readonly>
            <p class="my-1" style="color:red;">

            </p>
        </div>
        <div class="form-group">
            <label for="ref_id">Reference ID</label>
            <input type="text" name="ref_id" value="@if(isset($result[0]->req_id)) {{$result[0]->ref_id }} @endif"
                id="ref_id" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="text" class="form-control" id="inputname" placeholder="Name" name="name"
                value="@if(isset($result[0]->req_id)) {{$result[0]->request_name }} @endif" readonly>
            <p class="my-1" style="color:red;">
            </p>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address Line 1</label>
                <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address1"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_add1 }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
            <div class="form-group col-md-6">
                <label for="address2">Address Line 2</label>
                <input type="text" class="form-control" id="address2" placeholder="Enter your address" name="address2"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_add2 }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter your City" name="city"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_city }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_state }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
            <div class="form-group col-md-2">
                <label for="zip">zip</label>
                <input type="text" class="form-control" id="zip" onkeypress="isInputNumber(event)" name="zip"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_zip }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_email }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control" onkeypress="isInputNumber(event)"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_email }} @endif" readonly>
                <p class="my-1" style="color:red;">
                </p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="assigntech">Asign to Technician</label>
                <input type="text" name="tech" id="assigntech" class="form-control">
                <p class="my-1" style="color:red;">
                </p>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control"
                    value="@if(isset($result[0]->req_id)) {{$result[0]->request_date }} @endif">
                <p class="my-1" style="color:red;" readonly>
                </p>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" name="assign">Assign</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>
</div>
<style>
    .s_flash {
        margin-bottom: 0.5rem !important;
        margin-top: 3rem !important;
        /* padding: 0rem !important; */
        font-size: 1rem !important;
    }
</style>
@endsection