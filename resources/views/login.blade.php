@extends('Homepage.footer')
@section('page_title','Login Page')
<div class="mb-3 mt-5 text-center" style="font-size:30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online Service Management System</span>
</div>
<p class="text-center font-20  mt-5 mb-3"> <i class="fas fa-user-secret text-danger"></i> Login here</p>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-md-4 ">
            <form action="{{url('/LoginSubmit')}}" class="shadow-lg p-4 mt-5" method="POST">
                @csrf
                @if(Session::has('msg'))
                <p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
                @elseif(Session::has('auth'))
                <p class="alert alert-danger s_flash">{{Session::get('auth')}}</p>
                @endif
                <div class="form-group">
                    <label for="email" class="font-weight-bold "><i class="fas fa-user"></i>
                        Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email">
                    <p class="my-1" style="color:red;">
                        @error('email')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold "><i class="fas fa-key"></i>
                        Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <p class="my-1" style="color:red;">
                        @error('password')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <button type="submit" class="btn btn-outline-danger btn-block mt-3 font-weight-bold shadow-sm" name="submit">Login</button>
            </form>
            <div class="d-flex justify-content-center">
                <a href="{{url('/')}}" class="btn btn-info mt-4 ">Back to home</a>
            </div>
        </div>
    </div>
</div>
<style>
    footer {
        display: none !important;
    }
    .s_flash{
        margin-bottom: 0.5rem !important;
        margin-top: 0rem !important; 
        /* padding: 0rem !important; */
        font-size: 1rem !important;
    }
</style>
@extends('Homepage.header')