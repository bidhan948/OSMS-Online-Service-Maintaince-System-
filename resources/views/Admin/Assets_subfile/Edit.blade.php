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
@section('page_title', 'Edit product detail')
@section('container')
    <div class="col-sm-9 col-md-6 mt-5 jumbotron mx-5">
        @if (Session::has('msg'))
            <p class="alert alert-danger s_flash">{{ Session::get('msg') }}</p>
        @endif
        <p class="text-center font-weight-bold " style="font-size: 1.5rem;">Update Products Detail</p>
        <form action="{{ url('Admin/Assets_update/') }}" method="POST" class="">
            @csrf
            <div class="form-group">
                <label for="id" class="font-weight-bold">Product ID</label>
                <input type="text" name="id" id="id" class="form-control" value="{{ $result[0]->p_id }}" readonly>
            </div>
            <div class="form-group">
                <label for="name" class="font-weight-bold">Product name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $result[0]->p_name }}">
                {{-- <p class="my-1" style="color:red;">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="Oprice" class="font-weight-bold">Product Orginal price</label>
                <input type="text" name="Oprice" id="Oprice" class="form-control" value="{{ $result[0]->p_orginalprice }}" onkeypress="isInputNumber()">
                {{-- <p class="my-1" style="color:red;">
                    @error('Oprice')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="Sprice" class="font-weight-bold">Product Selling price</label>
                <input type="text" name="Sprice" id="Sprice" class="form-control" value="{{ $result[0]->p_sellingprice }}" onkeypress="isInputNumber()">
                {{-- <p class="my-1" style="color:red;">
                    @error('Sprice')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="total" class="font-weight-bold">Total</label>
                <input type="text" name="total" id="total" class="form-control" value="{{ $result[0]->p_total }}" onkeypress="isInputNumber()">
                {{-- <p class="my-1" style="color:red;">
                    @error('total')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="available" class="font-weight-bold">Available</label>
                <input type="text" name="available" id="available" class="form-control"
                    value="{{ $result[0]->p_available }}" onkeypress="isInputNumber()">
                {{-- <p class="my-1" style="color:red;">
                    @error('available')
                        {{ $message }}
                    @enderror
                </p> --}}
            </div>
            <div class="form-group">
                <label for="date" class="font-weight-bold">Date of purchase</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $result[0]->p_dop }}">
                {{-- <p class="my-1" style="color:red;">
                    @error('date')
                        {{ $message }}
                    @enderror
                </p> --}}
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
    
    {{-- only number for input fields --}}
    <script>
        function isInputNumber() {
            var ch = String.fromCharCode(.which);
            if (!(/[0-9]/.test(ch))) {
                .preventDefault()
            }
        }

    </script>
@endsection
