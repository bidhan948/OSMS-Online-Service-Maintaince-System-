<?php $dashboard=""; $submitRequest="active"; $checkstatus=""; $changepassword=""; $logout="";  ?>
@extends('user/layout')
@section('page_title', Session('user_name') . ' Dashboard')
@section('container')

    <div class="col-sm-9 col-md-10 mt-5">
        <form action="{{ url('/user/submit_Request_info') }}" method="POST" class="mx-5">
            @csrf
            @if (Session::has('msg'))
                <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
            @endif
            <div class="form-group">
                <label for="inputrequestinfo">Request info</label>
                <input type="text" class="form-control" id="inputrequestinfo" placeholder="Request info" name="requestinfo">
                <p class="my-1" style="color:red;">
                    @error('requestinfo')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label for="inputrequestdescription">Description</label>
                <input type="text" class="form-control" id="inputrequestdescription" placeholder="write Description"
                    name="requestdesc">
                <p class="my-1" style="color:red;">
                    @error('requestdesc')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group">
            <input type="text" name="ref_id"  value="{{Str::random(10)}}" hidden>
            </div>
            <div class="form-group">
                <label for="inputname">Name</label>
                <input type="text" class="form-control" id="inputname" placeholder="Name" name="name">
                <p class="my-1" style="color:red;">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address Line 1</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address1">
                    <p class="my-1" style="color:red;">
                        @error('address1')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-6">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control" id="address2" placeholder="Enter your address" name="address2">
                    <p class="my-1" style="color:red;">
                        @error('address2')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter your City" name="city">
                    <p class="my-1" style="color:red;">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state">
                    <p class="my-1" style="color:red;">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-2">
                    <label for="zip">zip</label>
                    <input type="text" class="form-control" id="zip" onkeypress="isInputNumber(event)" name="zip">
                    <p class="my-1" style="color:red;">
                        @error('zip')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <p class="my-1" style="color:red;">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-2">
                    <label for="mobile">mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" onkeypress="isInputNumber(event)">
                    <p class="my-1" style="color:red;">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-2">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control">
                    <p class="my-1" style="color:red;">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
            <buton class="btn btn-secondary">Reset</buton>
        </form>
    </div>
    <style>
        .s_flash {
            margin-bottom: 0.5rem !important;
            margin-top: 0rem !important;
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
