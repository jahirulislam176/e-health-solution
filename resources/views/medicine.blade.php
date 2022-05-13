@extends('index')
@section('middle')
<section class="L-bannaer">
    <div class="row bg-dark">
        <div class="col-lg-3 lbnar ">
            <ul class="nav flex-column text-white" style="margin-left:15px;">
                <li class="nav-item product">
                    <a class="nav-link active lbnarr text-white" href="{{URL::to('/')}}">Here You Can Get</a>
                </li>
                <li class="nav-item lbnarr">
                    <a class="nav-link SM" href="">MEDICINE</a>
                </li>
                
                <li class="nav-item lbnarr">
                    <a class="nav-link SM" href="{{URL::to('/contact')}}">HELP</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9">
            @if(session()->get('adminid'))
            <div class="contact bg-info" >
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
    <!-- </div>-->
</section>
<section class="downbannar">
    <div class="container mt-5">
        <div class="row ">
            <div class="col-lg-3 dda">
                <a class="nav-link butt"href="{{URL::to('/contact')}}">
                    <span class="sp"><i class="fas fa-question-circle pr-2" style="font-size:20px; text-decoration:none;color:black;"></i>How To Order</span></a>
            </div>
            <div class="col-lg-3 dda">
                <a class="nav-link butt" href="{{URL::to('/contact')}}">
                    <span class="sp"><i class="fas fa-question-circle pr-2" style="font-size:20px; text-decoration:none;color: black;"></i>Send an SMS</span></a>
            </div>
            <div class="col-lg-3 dda">
                <a class="nav-link butt" href="{{URL::to('/medicine')}}">
                    <span class="sp"><i class="fas fa-question-circle pr-2" style="font-size:20px; text-decoration:none;color:black;"></i>Order Online</span></a>
            </div>
            <div class="col-lg-3 dda">

                <a class="nav-link butt" href="{{URL::to('/contact')}}">
                    <span class="sp"><i class="fas fa-question-circle pr-2" style="font-size:20px; text-decoration:none;color:black;"></i>Send An Email</span></a>
            </div>
        </div>
    </div>

</section>
<section class="bannersecond">
    <div class="container bg-white text-center">
        <h4 class="py-4 font-weight-bold text-black">৳60 Delivery Charge, Free Delivery for First Orders!</h4>
        <div class="row">
            <div class="col-lg-4">
                <i class="fas fa-marker pr-2" style="font-size:20px; text-decoration:none;color:gray;"></i>Only certified medicine available
            </div>
            <div class="col-lg-4">
                <i class="fas fa-money-bill-alt pr-2" style="font-size:20px; text-decoration:none;color:gray;"></i>Payment: Cash on Delivery
            </div>
            <div class="col-lg-4">
                <i class="fas fa-map pr-2" style="font-size:20px; text-decoration:none;color:gray;"></i> Delivery anywhere in Dhaka City
            </div>
            <div class="col-lg-4">
                <i class="fas fa-clock pr-2" style="font-size:20px; text-decoration:none;color:gray;"></i> Order by 2pm for Same day delivery
            </div>
            <div class="col-lg-4">
                <i class="fas fa-user-md pr-2" style="font-size:20px; text-decoration:none;color:gray"></i>Pharmacist available for consultation
            </div>
            <div class="col-lg-4">
                <i class="fas fa-question-circle pr-2" style="font-size:20px; text-decoration:none;color:gray"></i>Only certified medicine available
            </div>
        </div>
    </div>
</section>
<!--test-->
@if(session()->get('adminid'))
<div class="contact "style="background-color: #C0C0C0" >
    <div class="container text-white py-5">
        <h1 class="text-center" style="color: black;"><u>Add Medicine</u></h1>
        
        <form method="post" action="{{URL::to('/save-medicine')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row" style="color: black;">
                <div class="col-4 ">
                    <label for="exampleFormControlInput1">Medicine</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name">
                </div>
                <div class="col-2">
                    <label for="exampleFormControlInput1">Price</label>
                    <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="price">
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Type</label>
                    <input type="text" class="form-control" name="type" id="exampleFormControlInput1" placeholder="tablat/sirup">
                </div>
                <div class="col-4  my-3">
                    <label class="custom-file-label" for="customFile">Choose Image</label>
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                </div>
            </div>

            <div class="form-row "style="color: black;">
                <label for="exampleFormControlTextarea1">Some info</label>
                <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-row my-2">
                <button type="submit" class="btn btn-info md-2">ADD MEDICINE</button>
            </div>

        </form>
    </div>
</div>
@endif
<section class="medicine">
    <div class="container mt-3">
        <h1 class="text-center">Medicines</h1>
        <hr>
        @if(!session()->get('usersid'))
        <div class="buy text-danger">If You want to buy, Please <a href="{{URL::to('/user-login')}}">Login</a> First</div>
        @else
        <p style="color:red">you already done</p>
        @endif
        {{session()->put('error','')}}
        <div class="row">
            @foreach($medicine_data as $medicine)
            <div class="col-lg-3" >
                <div class=" card border-info  text-center my-2" height="px">
                    <img height="200px" class="card-img-top" src="{{$medicine->image}}" alt="Medicine">
                    <div class="card-body">
                        <h4 class="card-title">{{$medicine->medicinename}}</h4>
                    <ul  class="list-group list-group-flush">
                        <li class="list-group-item">({{$medicine->type}})</li>
                        <li class="list-group-item">MRP ৳ {{$medicine->price}}</li>
                    </ul>
                    </div>
                    <div class="card-body cart">
                        @if(session()->get('adminid'))
                        <button type="button" class="b1" data-toggle="modal" data-target="#">
                            <a class="nav-link btn-danger " style="font-size:15px;" href="{{URL::to('/delete'.'/'.'medicine'.'/'.$medicine->id)}}">
                                <span style="">Remove</span></a>
                        </button>
                        @else
                        @if(session()->get('usersname'))
                        <button type="button" class="b1" data-toggle="modal" data-target="#">
                            <a class="nav-link btn-success " style="font-size:15px;" href="{{URL::to('/add2cart'.'/'.session()->get('usersid').'/'.$medicine->id)}}">
                                <span style="">Add Cart</span></a>
                        </button>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection