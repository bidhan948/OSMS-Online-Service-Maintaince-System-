<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap css  -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../CSS/all.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- CUTSOM CSS -->
    <link rel="stylesheet" href="../CSS/custom.css">

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
                    <li class="nav-item"><a href="{{url('user/dashboard')}}" class="nav-link <?php if(isset($dashboard)){ echo $dashboard; } ?>">
                                <i class="fas fa-user mr-2"></i>Profile</a></li>

                        <li class="nav-item"><a href="{{url('user/SubmitRequest')}}" class="nav-link <?php if(isset($submitRequest)){ echo $submitRequest; } ?>">
                                <i class="fab fa-accessible-icon  mr-2"></i>Submit request</a></li>
                        <li class="nav-item"><a href="{{url('user/CheckStatus')}}" class="nav-link <?php if(isset($checkstatus)){ echo $checkstatus; } ?> ">
                                <i class="fas fa-align-center  mr-2"></i>Service status</a></li>
                        <li class="nav-item"><a href="{{url('user/ChangePassword')}}" class="nav-link <?php if(isset($changepassword)){ echo $changepassword; } ?> ">
                                <i class="fas fa-key  mr-2"></i>Change Password</a></li>
                        <li class="nav-item"><a href="{{url('/user/logout')}}" class="nav-link <?php if(isset($logout)){ echo $logout; } ?> ">
                                <i class="fas fa-sign-out-alt  mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
                @section('container')
                    

                
                @show 
        </div>
    </div>
    <!-- botstrap js -->
    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/all.min.js"></script>

</body>

</html>