@extends('index')
@section('middle')
<section class="L-bannaer">
        <div class="row bg-dark">
            <div class="col-lg-3 lbnar">
                <ul class="nav flex-column text-white" style="margin-left:15px;">
                    <li class="nav-item product">
                        <a class="nav-link active lbnarr text-white" href="{{URL::to('/')}}">OUR SERVICES</a>
                    </li>
                    <li class="nav-item lbnarr">
                        <a class="nav-link SM" href="{{URL::to('/blood')}}">BLOOD BANK</a>
                    </li>
                    <li class="nav-item lbnarr">
                        <a class="nav-link SM" href="{{URL::to('/medicine')}}">MEDICINE</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                @if(session()->get('adminid'))
                <div class="contact bg-info">
                    <div class="container text-white py-5">
                        <h1 class="text-center">Add Banner</h1>
                        <form method="post" action="{{URL::to('/save-banner')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            <div class="col-3">
                              <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name">
                            </div>
                            <div class="col-6">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <input type="file" class="custom-file-input" id="customFile" name="bannerimage">
                             </div>
                            <div class="col-3">
                              <select id="exampleFormControlInput2" name="bannerposition" class="custom-select custom-select-sm">
                                <option selected>Select Position</option>
                                <option value="1">Home</option>
                                <option value="3">Medicine</option>
                                <option value="4">Blog</option>
                              </select>
                            </div>
                            </div>

                            <div class="form-row">
                              <button type="submit" class="btn btn-primary mb-2 mt-2">ADD BANNER</button>
                            </div>

                          </form>
                    </div>
                </div>
                @else
                <div id="carouselExampleControls" class="carousel slide sss" data-ride="carousel">
                    <div class="carousel-inner">
                        
                        @foreach($b as $ba)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{$ba->bannerimage}}" alt=" slide" style="height:400px;overflow-y: hidden">
                        </div>
                        @endforeach
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('/')}}/public/style/img/f2.jpg" alt=" slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @endif 
            </div>
        </div>
        <!--        </div>-->
    </section>

<section class="">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('/')}}/public/style/img/s.jpg" class="img-fluid" style="border-radius: 40px" alt="">
                </div>
                <div class="col-lg-6 text-center">
                    <h1 class="py-5 text-center" style="color:#007b5e">About Us <hr></h1>
                    
                    <p class="text-center pl-5">Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur adipisicing elit. Porro quae eligendi, perspiciatis quisquam repellendus accusamus dolorem rerum. Earum deleniti maxime eum cum, aliquam doloribus, ut est, explicabo,
                    </p>
                    
                </div>

            </div>
        </div>
    </section>
@if(!session()->get('username') && session()->get('adminid'))
<div class="contact bg-light" >
        <div class="container text-white py-5">
            <h1 class="text-center" style="text-shadow:0 0 3px #000;">ADD Doctor</h1>
            <form method="post" action="{{URL::to('/save-doctor')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                <div class="col-4">
                  <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="col-3">
                    <label class="custom-file-label" for="customFile">Select Image</label>
                    <input type="file" class="custom-file-input" id="customFile" name="doctorimage">
                 </div>
                    <div class="col-5">
                  <input type="number" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Phone">
                </div>
                </div>
                <div class="form-row my-5">
                    <div class="col-6">
                  <input type="text" class="form-control" name="location" id="exampleFormControlInput1" placeholder="Location">
                </div>
                <div class="col-6">
                  <select id="exampleFormControlInput2" name="doctorstatus" class="custom-select custom-select-sm">
                    <option value="1">allowed</option>
                    <option value="0">Pending</option>
                  </select>
                </div>
                </div>
                
                
                <div class="form-row">
                  <button type="submit" class="btn btn-danger m-auto">Post</button>
                </div>
                
              </form>
        </div>
    </div>
@endif
    <section class="doctor">
        <div class="container py-5 text-center">

            <!--            test-->
            <section id="team" class="pb-5">
                <div class="container">
                    <h5 class="section-title h1">OUR Doctors
                        <hr>
                    </h5>

<!--                    <div class="row">
                         Team member 
                        @foreach($taf as $kaf)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip">
                                <div class="mainflip flip-0">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p><img class=" img-fluid" src="{{$kaf->doctorimage}}" alt="card image"></p>
                                                <h4 class="card-title">{{$kaf->name}}</h4>
                                                <p class="card-text">From {{$kaf->location}}. Doctor {{$kaf->name}} and Contact is {{$kaf->phone}}</p>
                                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-mouse"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="backside">
                                        <div class="card">
                                            <div class="card-body text-center mt-4">
                                                <h4 class="card-title">{{$kaf->name}}</h4>
                                                <p class="card-text">May Allah Make you helthy.</p>
                                                <p class="card-text">{{$kaf->phone}}</p>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a class="social-icon text-xs-center" target="_blank" href="">
                                                            <i class="fab fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="social-icon text-xs-center" target="_blank" href="">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="social-icon text-xs-center" target="_blank" href="">
                                                            <i class="fab fa-skype"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="social-icon text-xs-center" target="_blank" href="">
                                                            <i class="fab fa-google"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        @endforeach
                        
                         ./Team member 

                    </div>-->
                </div>
            </section>
            <!-- Team -->
            <!--            test-->
            <div class="row">
                @foreach($taffa as $kaffa)
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card py-4">
                        <div class="card-head">
                            <p class="font-width-bold">Dr. {{$kaffa->name}}<br><small>{{$kaffa->location}}</small></p>
                            <img src="{{$kaffa->doctorimage}}" class="img-fluid" alt="">
                            <p class="pt-3">contact:<br>{{$kaffa->phone}}</p>
                            <a href="https://www.facebook.com/lisan.nasil.73/"> <span style="color:rgba(1,102,140,.95);font-size:20px;"><i class="fab fa-facebook-f px-4"></i></span></a>
                            <a href="https://twitter.com/LisanSaiduzzCSE"><span style="color:rgba(1,102,140,.95);font-size:20px;"><i class="fab fa-twitter px-4"></i></span></a>
                            <a href="https://www.youtube.com/channel/UCORdCF61Uez8Mar-2WkgpDA"><span style="color:rgba(1,102,140,.95);font-size:20px;"><i class="fab fa-youtube px-4"></i></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="services">
        <h5 class="section-title h1">OUR Services
                        <hr>
                    </h5>
        <div class="container text-center py-5">
            <div class="row">
                <div class="col-lg-4 mb-3 col-md-12 col-sm-12 col-12">
                    <span><i class="fas fa-user-nurse"></i></span>
                    <h2 class="font-weight-light"> Team of Nurses</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, veniam.</p>
                </div>
                <div class="col-lg-4 mb-3 col-md-12 col-sm-12 col-12">
                    <span><i class="fas fa-briefcase-medical fa-blood"></i></span>
                    <h2 class="font-weight-light">Aid Boxes</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, veniam.</p>
                </div>
                <div class="col-lg-4 mb-3 col-md-12 col-sm-12 col-12">
                    <span><i class="fas fa-syringe"></i></span>
                    <h2 class="font-weight-light">Better Treatment</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, veniam.</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <span><i class="fas fa-microscope"></i></span>
                    <h2 class="font-weight-light">Disease Recovery</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, veniam.</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <span><i class="fas fa-stethoscope"></i></span>
                    <h2 class="font-weight-light">Check Up Time</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, veniam.</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <span><i class="fas fa-ambulance"></i></span>
                    <h2 class="font-weight-light">Active Emengency</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, veniam.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container text-center py-5">
            <h1>Latest From Blog</h1>
            <hr>
            <div class="row">
                @foreach($c as $kakka)
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card overflow-hidden" style="height:410px;">
                        <div class="card-head" style="">
                            <img src="{{$kakka->blogimage}}" alt="" class="img-fluid" style="height:200px; width:100%">
                        </div>
                        <div class="card-body">
                            <p class="font-weight"><u><a href="{{URL::to('/blog')}}"><b>{{$kakka->blogheading}}</b></a></u></p>
                            <p>{{$kakka->bloginfo}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>

    <section class="call">
        <div class="container text-center py-5 bg-white">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <a href="{{URL::to('/contact')}}"><span><i class="fas fa-phone-volume"></i></span>
                    <h5>Give Us a Short Call</h5></a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <a href="https://www.google.com/maps/@24.0351884,89.7931681,350m/data=!3m1!1e3"><span><i class="fas fa-map-marker-alt"></i></span>
                        <h5>Search Us On google</h5></a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <a href="{{URL::to('/contact')}}"><span><i class="fas fa-envelope"></i></span>
                    <h5>Send Us a Short E-mail</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
