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
@section('page_title', 'Requester page')
@section('container')
    <div class="col-sm-9 col-md-10 mt-5 text-center">
        @if (Session::has('msg'))
            <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
        @endif
        @if (isset($result[0]))
            <p class="bg-dark p-2 text-white font-weight-bold">Product/Parts detail</p>
            <table class="table responsive">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">DOP</th>
                        <th scope="col">Available</th>
                        <th scope="col">Total</th>
                        <th scope="col">Orginal cost each</th>
                        <th scope="col">Selling Price each</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                        <tr>
                            <td class="pt-4">{{ $item->p_id }}</td>
                            <td class="pt-4">{{ $item->p_name }}</td>
                            <td class="pt-4">{{ $item->p_dop }}</td>
                            <td class="pt-4">
                                @if ($item->p_available == 0)
                                    <span class="text-danger alert-danger p-2">Out of Stock
                                        <i class="fas fa-frown ml-1 text-secondary" style="font-size: 1.1rem;"></i></span>
                                @else
                                    {{ $item->p_available }}
                                @endif
                            </td>
                            <td class="pt-4">{{ $item->p_total }}</td>
                            <td class="pt-4">{{ $item->p_orginalprice }}</td>
                            <td class="pt-4">{{ $item->p_sellingprice }}</td>
                            <td>
                                <form action="{{ url('Admin/Assets_action/' . $item->p_id) }}" class="d-inline"
                                    method="POST">
                                    @csrf
                                    <button class="btn" name="update" style="font-size:1.2rem;"><i
                                            class="fas fa-edit text-info"></i></button>
                                    <button class="text-danger ml-4 btn" name="delete" style="font-size:1.2rem;"><i
                                            class="fas fa-trash-alt"></i></button>
                                    @if ($item->p_available == 0)
                                    <button class="text-danger ml-4 btn" name="sell" style="font-size:1.2rem;" disabled><i
                                        class="fas fa-handshake"></i></button>                                        
                                    @else
                                        <button class="text-danger ml-4 btn" name="sell" style="font-size:1.2rem;"><i
                                                class="fas fa-handshake"></i></button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-warning s_flash">No assets in the inventory !</p>
        @endif
    </div>
    </div>
    <div class="float-right">
        <a href="{{ url('Admin/Add_Assets') }}" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
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
