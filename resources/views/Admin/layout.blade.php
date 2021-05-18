<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap css  -->
<link rel="stylesheet" href="{{asset('../CSS/bootstrap.min.css')}}">

    <!-- font awesome -->
<link rel="stylesheet" href="{{asset('../CSS/all.min.css')}}">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- CUTSOM CSS -->
<link rel="stylesheet" href="{{asset('../CSS/custom.css')}}">

    <title>@yield('page_title')</title>
</head>

<body>
    <!-- top nav bar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-wrap p-0 shadow">
        <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0">OSMS</a>
    </nav>
    <!-- end of nav bar -->

    <!-- sidebar -->
    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column mt-2">
                        <li class="nav-item"><a href="{{ url('Admin/Dashboard') }}" class="nav-link <?php if (isset($dashboard)) {
    echo $dashboard;
} ?>">
                                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/WorkOrder') }}" class="nav-link <?php if (isset($workoffer)) {
    echo $workoffer;
} ?> ">
                                <i class="fab fa-accessible-icon  mr-2"></i>Work Order</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/Request') }}" class="nav-link <?php if (isset($submitRequest)) {
    echo $submitRequest;
} ?>">
                                <i class="fas fa-align-center  mr-2"></i>Request</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/Assets') }}" class="nav-link <?php if (isset($assets)) {
    echo $assets;
} ?> ">
                                <i class="fas fa-database  mr-2"></i>Assets</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/Technician') }}" class="nav-link <?php if (isset($technician)) {
    echo $technician;
} ?> ">
                                <i class="fab fa-teamspeak mr-2"></i>Technician</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/Requester') }}" class="nav-link <?php if (isset($requester)) {
    echo $requester;
} ?> ">
                                <i class="fas fa-users  mr-2"></i>Requester</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/SellReport') }}" class="nav-link <?php if (isset($sellreport)) {
    echo $sellreport;
} ?> ">
                                <i class="fas fa-table  mr-2"></i>Sell Report</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/WorkReport') }}" class="nav-link <?php if (isset($workreport)) {
    echo $workreport;
} ?> ">
                                <i class="fas fa-table  mr-2"></i>Work Report</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/ChangePassword') }}" class="nav-link <?php if (isset($changepassword)) {
    echo $changepassword;
} ?> ">
                                <i class="fas fa-key  mr-2"></i>Change Password</a></li>
                        <li class="nav-item"><a href="{{ url('Admin/logout') }}" class="nav-link <?php if (isset($logout)) {
    echo $logout;
} ?> ">
                                <i class="fas fa-sign-out-alt  mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            @section('container')



            @show
        </div>
    </div>
    <!-- botstrap js -->
<script src="{{asset('../JS/jquery.min.js')}}"></script>
<script src="{{asset('../JS/popper.min.js')}}"></script>
<script src="{{asset('../JS/bootstrap.min.js')}}"></script>
<script src="{{asset('../JS/all.min.js')}}"></script>

</body>

</html>
