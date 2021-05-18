<?php $dashboard = '';
$submitRequest = '';
$assets = 'active';
$requester = '';
$workreport = '';
$sellreport = '';
$technician = '';
$workoffer = '';
$changepassword = '';
$logout = '';
?>
@extends('Admin/layout')
@section('page_title', 'Sell product detail')
@section('container')
    <div class="col-sm-9 col-md-6 mt-5 jumbotron mx-5">
        @if (Session::has('msg'))
            <p class="alert alert-danger s_flash">{{ Session::get('msg') }}</p>
        @endif
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Sell Products Detail</p>
        <form action="{{ url('Admin/SellProduct/') }}" method="POST" class="">
            @csrf
            <div class="form-group">
                <label for="id" class="font-weight-bold">Product ID</label>
                <input type="text" name="id" id="id" class="form-control" value="{{ $result[0]->p_id }}" readonly>
            </div>
            <div class="form-group">
                <label for="name" class="font-weight-bold">Product name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $result[0]->p_name }}" readonly>
                {{-- <p class="my-1" style="color:red;">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="c_name" class="font-weight-bold">Customer Name</label>
                <input type="text" name="c_name" id="c_name" class="form-control">
                {{-- <p class="my-1" style="color:red;">
                    @error('Oprice')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="c_add" class="font-weight-bold">Customer address</label>
                <input type="text" name="c_add" id="c_add" class="form-control">
                {{-- <p class="my-1" style="color:red;">
                    @error('Sprice')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="available" class="font-weight-bold">Available</label>
                <input type="text" name="available" id="available" class="form-control"
                    value="{{ $result[0]->p_available }}" readonly>
                {{-- <p class="my-1" style="color:red;">
                    @error('available')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="p_cost" class="font-weight-bold">Product Cost</label>
            <input type="text" name="p_cost" id="p_cost" class="form-control" value="{{$result[0]->p_sellingprice}}" readonly>
                {{-- <p class="my-1" style="color:red;">
                    @error('total')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="p_quantity" class="font-weight-bold">Product Quantity</label>
                <input type="text" name="p_quantity" id="p_quantity" class="form-control" onkeypress="isinputnumber()">
                {{-- <p class="my-1" style="color:red;">
                    @error('total')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="date" class="font-weight-bold">Date of purchase</label>
                <input type="date" name="date" id="date" class="form-control">
                {{-- <p class="my-1" style="color:red;">
                    @error('date')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <button type="submit" class="btn btn-danger" name="sell">SELL</button>
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
