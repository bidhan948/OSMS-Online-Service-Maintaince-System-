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
@section('page_title', 'Add Assets')
@section('container')
    <div class="col-sm-9 col-md-6 mt-5 jumbotron mx-5">
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Add Assets</p>
        <form action="{{ url('Admin/Insert_assets/') }}" method="POST" class="mx-5">
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">Product Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="date" class="font-weight-bold">Date of Purchase</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="available" class="font-weight-bold">Available</label>
                <input type="text" name="available" id="available" class="form-control" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="total" class="font-weight-bold">Total</label>
                <input type="text" name="total" id="total" class="form-control" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Ocost" class="font-weight-bold">Orginal Cost each</label>
                <input type="text" name="Ocost" id="Ocost" class="form-control" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Scost" class="font-weight-bold">Selling Cost each</label>
                <input type="text" name="Scost" id="Scost" class="form-control" onkeypress="isInputNumber(event)">
            </div>
            <button type="submit" class="btn btn-info" name="Submit">Submit</button>
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
    
    {{-- only number for input fields --}}
    <script>
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault()
            }
        }

    </script>
@endsection
