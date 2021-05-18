@if(Session::has('msg'))
<p class="alert alert-success s_flash">{{ Session::get('msg') }}</p>
@endif
    <!-- start navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text d-sm-none d-md-block">Customer's happiness is our aim</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collpase navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="{{url('/login')}}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!-- end navigation -->

    <!--start header jumbotron -->
    <header class="jumbotron back-image img-fluid" style="background-image: url(./image/banner1.jfif);">
        <div class="mt-4 mainHeading">
            <h1 class="text-white text-uppercase font-weight-bold mt-5">Welcome to OSMS</h1>
            <p class="text-white font-italic font-20 mt-3">Customer happiness is our aim</p>
        <a href="{{url('/login')}}" class="btn btn-success mr-4 mt-2">Login</a>
            <a href="" class="btn btn-danger mr-4 mt-2">Sign up</a>
        </div>
    </header>
    <!-- end header jumbotron -->

    <!-- staet introduction section -->
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">OSMS Services</h3>
            <p class="text-center font-italic">
                OSMS Services is Nepal's leading chain of multi-brand Electrical Service
                workshops offering wide array of services . We focus on enhancing client
                experinece by offering world-class Electronic Appicances maintenance Services
                . Our sole mission is " To provide Electronic Appliances care services to keep
                the devices fit and healthy and customers happy and smiling". With well-equipped
                Electronic Appliances care services centers and fully trained mechaincs, we provide
                quality service with excellent packages that are designed to offer you great savings
                . Our state-of-art are convenintly located in many cities across the country. Now you
                can bok your service online by doiong registration
            </p>
        </div>
    </div>
    <!-- end introduction section -->

    <!-- start service section -->
    <div class="container text-center border-bottom">
        <h2>Our services</h2>
        <div class="row mt-4 mb-4">
            <div class="col-md-4 col-sm-12 mb-4">
                <a href=""> <i class="fas fa-tv fa-8x text-success"></i> </a>
                <h4 class="pt-3">Electronic Applicances</h4>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <a href=""> <i class="fas fa-sliders-h fa-8x text-primary"></i> </a>
                <h4 class="pt-3">Preventive Maintenance</h4>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <a href=""> <i class="fas fa-cogs fa-8x text-info"></i> </a>
                <h4 class="pt-3">Fault Repair</h4>
            </div>
        </div>
    </div>
    <!-- end service section -->

    <!-- start registration form -->
    <div class="container pt-5">
        <h2 class="text-center">Create an Account</h2>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
            <form action="{{url('/Signup')}}" method="POST" class="shadow-lg p-4">
                    @csrf
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">
                            Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        <p class="my-1" style="color:red;">
                            @error('name')
                                {{$message}}
                            @enderror
                         </p>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">
                            Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <p class="my-1" style="color:red;">
                            @error('email')
                                {{$message}}
                            @enderror
                         </p>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">
                            New Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <p class="my-1" style="color:red;">
                            @error('password')
                                {{$message}}
                            @enderror
                         </p>
                    </div>
                    <button class=" mt-2 btn btn-danger btn-block shadow-sm font-weight-bold" type="submit"
                        name="rsignup">Sign up</button>
                    <em style="font-size:10px;">Note -By clicking Sign up, you agree to our Terms, Data Policy and
                        cookie Policy</em>
                </form>
            </div>
        </div>
    </div>

    <!-- end registration form -->
    <!-- start happy customer -->
    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white mb-5 font-weight-bold">Happy Customers</h2>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="./image/person-2.jpg" alt="" class="img-fluid" style="border-radius: 100px;"
                                height="150" width="150">
                            <h4 class="card-title pt-2">Rasmus Ledroff</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque adipisci
                                id quas quo fugit quae asperiores temporibus architecto velit sapiente labore maiores,
                                odit placeat, obcaecati exercitationem, quod incidunt minima ad!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="./image/Sam-Revilter.jpg" alt="" class="img-fluid" style="border-radius: 100px;"
                                height="150" width="150">
                            <h4 class="card-title pt-2">Taylor Otwell</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque adipisci
                                id quas quo fugit quae asperiores temporibus architecto velit sapiente labore maiores,
                                odit placeat, obcaecati exercitationem, quod incidunt minima ad!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="./image/team4-large.jpg" alt="" class="img-fluid" style="border-radius: 100px;"
                                height="150" width="150">
                            <h4 class="card-title pt-2">Jeff besos</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque adipisci
                                id quas quo fugit quae asperiores temporibus architecto velit sapiente labore maiores,
                                odit placeat, obcaecati exercitationem, quod incidunt minima ad!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end happy customers -->

    <!-- start contacct us  -->
    <div class="container">
        <h2 class="text-center font-weight-bold">Contact us</h2>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <form action="" method="POST" class="my-4">
                    <input type="text" class="form-control" name="name" placeholder="Name"><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                    <input type="email" class="form-control" name="email" placeholder="Email"><br>
                    <textarea name="" id="" class="form-control" name="message" style="height: 150px;"
                        placeholder="How can we help you?"></textarea><br>
                    <input type="submit" class="btn btn-primary" value="send" name="submit"><br><br>
                </form>
            </div>
            <div class="col-md-4 col-sm-12 text-center mt-3">
                <strong>Headquarter:</strong><br>
                OSMS pvt Ltd, <br>
                Katahari-2, Hathkhola <br>
                Biratnagar - 56613 <br>
                phone: +977 9815386000 <br>
                <a href="https://bidhan948.github.io/bidhanbaniya.github.io/" target="_blank">www.bidhan.com.np</a>
                <br><br>
                <strong>Branch:</strong><br>
                OSMS pvt Ltd, <br>
                Katahari-2, Hathkhola <br>
                Biratnagar - 56613 <br>
                phone: +977 9815386000 <br>
                <a href="https://bidhan948.github.io/bidhanbaniya.github.io/" target="_blank">www.bidhan.com.np</a>
                <br><br>
            </div>
        </div>
    </div>
<!-- end contact us -->