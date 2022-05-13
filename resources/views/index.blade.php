<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('/')}}/public/style/css/all.css">
        <!--     <link rel="stylesheet" href="{{asset('/')}}/public/style/css/blood.css">
             <link rel="stylesheet" href="{{asset('/')}}/public/style/css/blg.css">-->
        @yield('css')
        <link rel="stylesheet" href="{{asset('/')}}/public/style/css/style.css">  
        <title>E-Health Solution</title>
    </head>
    <body>
        <section class="head">
            <div class="corona" style="text-align:center; height:26px">
                <div class="col-lg-11"style="display:flex;"><div class="col-lg-2" style="padding-left: px;font-size: 17px;text-align:right;"><b>Corona Update :</b></div><marquee width="100%" direction="left">
                            The coronavirus COVID-19 is affecting 220 countries and territories. The day is reset after midnight GMT+0. The list of countries and their regional classification is based on the United Nations Geoscheme.
                            Sources are provided under "Latest News." Learn more about Worldometer's COVID-19 data
                        </marquee></div>
                @if(session()->get('adminid'))
                <div class="col-lg-1"><a href="{{URL::to('/sign-out')}}" style="text-decoration: none;"><span><i class="far fa-user"></i></span> Log Out</a></div>
                @elseif(!session()->get('usersid'))
                <div class="col-lg-1"><a href="{{URL::to('/sign-in')}}" style="text-decoration: none;"><span><i class="far fa-user"></i></span> Admin</a></div>
                @endif
            </div>
        </section>
        <section class="top" style="background:rgba(1,102,140,.95);">
            <div class="container text-light">
                <div class="row d-flex justify-content-between">
                    <div class="gmail font-weight-bold pr-5">
                        @if(session()->get('adminid'))
                        <a href="{{URL::to('/profile')}}"><button type="button" class="btn btn-info btn-sm" style="height:50px;"><p class="nan"style="color: white; padding-top:9px;"><b>All Users{{session()->get('name')}}</b></p></button></a>
                        @elseif(session()->get('usersid'))
                        <a href="{{URL::to('/profile')}}"><button type="button" class="btn btn-info btn-sm" style="height:50px;"><p class="nan"style="color: white; padding-top:9px;"><b>Your Profile: {{session()->get('usersname')}}</b></p></button></a>
                        @endif
                        
                    </div>
                    <div class="number font-weight-bold pr-5" style="padding-top:10px;">
                        
                        @if(session()->get('adminid'))  
                        {{session()->get('adminname')}}
                        @elseif(session()->get('usersid'))
                        {{session()->get('usersname')}}
                        @endif
                    </div>
                    <div class="amb font-weight-bold pr-2"style="height:50px;">
                        <button type="button" class="b1" data-toggle="modal" data-target="#exampleModal" style="height:50px; background-color:rgba(1,102,140,.95);">
                            <a class="nav-link btn-success amb" href="#" style="border-radius:5%;padding-top: 15px;height:50px;">
                                <span style="font-size:15px;"><i class="fas fa-ambulance pr-2" style="font-size:15px; text-decoration:none;color:aliceblue;"></i><b> HIRE NOW</b></span></a>
                        </button>
                        @if(!session()->get('adminid') && session()->get('usersname'))
                        <button type="button" class="b2" data-toggle="modal" data-target="#exampleModals" style="height:50px;background-color: rgba(1,102,140,.95);">
                            <a class="nav-link btn-success" style="border-radius:5%;padding-top: 15px;height:50px;" href="{{URL::to('/cart')}}">
                                <span style="font-size:15px;"><i class="fas fa-shopping-cart  pr-2" style="font-size:15px; text-decoration:none;color:aliceblue;"></i><b> Cart</b></span></a>
                        </button>
                        @endif
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Call If You Need</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ml-4" style="display: flex;">

                                        <div class="card" >

                                            <div class="card-body " style="text-align:center">
                                                <i class="fas fa-ambulance"></i>
                                                <div style="color:black;">
                                                    Ambulance
                                                </div>
                                                <div style="color:black;">
                                                    01000000000
                                                </div>

                                                <div style="color:black;">
                                                    Dhaka
                                                </div>

                                                <div class="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card" >
                                            <div class="card-body" style="text-align:center">
                                                <i class="fas fa-ambulance"></i>
                                                <div class=""  style="color:black;">
                                                    Ambulance
                                                </div>
                                                <div style="color:black;">
                                                    01786546546
                                                </div>

                                                <div style="color:black;">
                                                    Khulna
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card" >
                                            <div class="card-body" style="text-align:center">
                                                <i class="fas fa-ambulance"></i>
                                                <div class=""  style="color:black;">
                                                    Ambulance
                                                </div>
                                                <div style="color:black;">
                                                    01786546546
                                                </div>

                                                <div style="color:black;">
                                                    Rajsahi
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">



                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabels">Call If You Need</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navbar navbar-expand-lg navbar-light text-center" style="background: #0c5f7e; height:55px;">
            <a class="navbar-brand font-weight-bold pl-5 text-light" href="{{URL::to('/')}}"> <p style="font-family:Cursive; font-size:25px; color: #FFA533; ;"class="mt-3">E-Health Solution</p></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center ml-5" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-light  mt-3">
                    <li class="nav-item active font-weight-bold pr-5 text-center">
                        <a class="nav-link text-light text-center" href="{{URL::to('/')}}"> <p class="Alpha">HOME</p></a>
                    </li>
                    <li class="nav-item dropdown font-weight-bold pr-5 text-center" style="display: flex;">
                        <a class="nav-link  text-light d-inline-block" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="Alpha d-inline-block">SERVICES <i class="fa fa-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{URL::to('/blood')}}">BLOOD BANK</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{URL::to('/medicine')}}">MEDICINE CENTER</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{URL::to('/diagnosis')}}">DIAGNOSIS SERVICES</a>
                        </div>
                    </li>
                    <li class="nav-item font-weight-bold pr-5">
                        <a class="nav-link text-light" href="{{URL::to('/blog')}}"><p class="Alpha">BLOG</p></a>

                    </li>
                    
                    
                    @if(session()->get('adminid'))
                    <li class="nav-item font-weight-bold pr-5">
                        <a class="nav-link text-light" href="{{URL::to('/contact')}}"><p class="Alpha">Messages</p></a>
                    </li>
                    @else
                    <li class="nav-item font-weight-bold pr-5">
                        <a class="nav-link text-light" href="{{URL::to('/contact')}}"><p class="Alpha">CONTACT</p></a>
                    </li>
                    @endif
                    
                    
                    
                    
                    @if(session()->get('usersid'))
                    <li class="nav-item font-weight-bold pr-5 text-light">
                        <a class="nav-link text-light" href="{{URL::to('/sign-out')}}"><p class="Alpha">LOG OUT</p></a>
                    </li>
                    @elseif(session()->get('adminid'))
                   <li class="nav-item font-weight-bold pr-5 text-light">
                        <a class="nav-link text-light" href="{{URL::to('/sign-out')}}"><p class="Alpha">LOG OUT</p></a>
                    </li>
                    @else
                    <li class="nav-item font-weight-bold pr-5 text-light">
                        <a class="nav-link text-light menus" href="{{URL::to('/user-login')}}"><p class="Alpha">LOGIN</p></a>
                    </li>
                    @endif

                </ul>
            </div>
        </nav>
        @yield('middle')
        <!-- Footer -->
        <section class="footer">
            <footer class="text-center text-lg-start text-muted">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color:#99FF99">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block" style="color: #006600">
                        <span>Get connected with us on social networks:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div style="color:#006600">
                        <a href="" class="me-4 text-reset" style="font-size:20px;text-decoration:none;color: aliceblue;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 text-reset" style="font-size:20px;text-decoration:none;color: aliceblue;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-reset" style="font-size:20px;text-decoration:none;color: aliceblue;">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="me-4 text-reset" style="font-size:20px;text-decoration:none;color: aliceblue;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-reset" style="font-size:20px;text-decoration:none;color: aliceblue;">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="me-4 text-reset" style="font-size:20px;text-decoration:none;color: aliceblue;">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </section>
                <section class="">
                    <div class="container text-center text-md-start mt-5" style="color: aliceblue">
                        <div class="row mt-3">
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <h6 class="text-uppercase fw-bold mb-4" style="font-size:20px;text-decoration:none;color: aliceblue;">
                                    <i class="fas fa-moon me-3" class="fas fa-moon pr-2" style="font-size:20px; text-decoration:none;"></i> E-Health Solution
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer content. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit.
                                </p>
                            </div>
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" >
                                <h6 class="text-uppercase fw-bold mb-4">
                                    OUR SERVICES
                                </h6>
                                <p>
                                    <a href="{{URL::to('/contacts')}}" class="text-reset">Doctors and Thearpists</a>
                                </p>
                                <p>
                                    <a href="{{URL::to('/medicine')}}" class="text-reset">Medicine</a>
                                </p>
                                <p>
                                    <a href="{{URL::to('/blood')}}" class="text-reset">Blood Bank</a>
                                </p>
                                <p>
                                    <a href="{{URL::to('/')}}" class="text-reset">Ambulances</a>
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Useful links
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset">Meeting with Doctor</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Our Location</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset"></a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset"></a>
                                </p>
                                @if(!session()->get('adminid'))
                                <p>
                                   <h3> <a class="text-reset" href="{{URL::to('/sign-in')}}">Admin</a></h3>
                                </p>
                                @endif
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="text-align:left; padding-left:60px">

                                <h6 class="text-uppercase fw-bold mb-4 " style="padding-left:30px ">
                                    Contact
                                </h6>
                                <p><i class="fas fa-home me-3" class="fas fa-ambulance pr-2" style="font-size:20px; text-decoration:none;color: aliceblue;"></i>Banani, Dhaka-1213</p>
                                <p>
                                    <i class="fas fa-envelope me-3" class="fas fa-ambulance pr-2" style="font-size:20px; text-decoration:none;color: aliceblue;"></i>
                                    prime@asia.edu.bd
                                </p>
                                <p><i class="fas fa-phone me-3" class="fas fa-ambulance pr-2" style="font-size:20px; text-decoration:none;color: aliceblue;"></i> + 01 234 567 89</p>
                                <p><i class="fas fa-print me-3" class="fas fa-ambulance pr-2" style="font-size:20px; text-decoration:none;color: aliceblue;"></i> + 01 234 567 89</p>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="text-center p-4" style="color:darkorange">
                    © 2021 Copyright: Primeaisa E-Health Solution Team. (ASL)
                    <a class="text-reset fw-bold" href=""></a>
                </div>
            </footer>
        </section>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
