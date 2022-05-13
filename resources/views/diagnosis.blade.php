@extends('index')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}/public/style/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('/')}}/public/style/css/dia.css">
@endsection
@section('middle')
<div class="header">
    <h1>Diagnosis Section</h1>
    <hr>
</div>
@if(session()->get('adminid'))
<div class="contact" style="background-color: #C0C0C0" >
    <div class="container text-white py-5">
        <h1 class="text-center" style="color: black;">Add Test Items</h1>
        <hr>
        <form method="post" action="{{URL::to('/save-diagnosis')}}" enctype='multipart/form-data'>
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" style="color: black;">Test Name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name">
                </div>
                <div class="col-2">
                    <label for="exampleFormControlInput1" style="color: black;">Price</label>
                    <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="price">
                </div>
                
                <div class="col-3">
                    <label for="exampleFormControlInput1" style="color: black;">Type</label>
                    <input type="text" class="form-control" name="type" id="exampleFormControlInput1" placeholder="Test">
                </div>
                <div class="col-4  my-3">
                    <label class="custom-file-label" for="customFile" style="color: black;">Report Image</label>
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                 </div>
            </div>
            <div class="form-row my-3">
                <label for="exampleFormControlTextarea1" style="color: black;">Some info</label>
                <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-row" style="align-content: center">
                <button type="submit" class="btn btn-primary mb-2">ADD Test</button>
            </div>
        </form>
    </div>
</div>
@endif
<section class="AddTest>">
    <div class="container">
        <div class="row">
            @foreach($diagnosic as $diagnosis_data)
            <div class="col-lg-3 my-3">
                <div class="card border-info  text-center" style="width: 18rem;">
                    <img height="200px" class="card-img-top" src="{{$diagnosis_data->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 name="testname" class="card-title">{{$diagnosis_data->testname}}</h5>
                        <p class="card-text">MRP ৳ {{$diagnosis_data->price}}</p>
                        <p class="card-text">({{$diagnosis_data->type}})</p>
                        @if(session()->get('adminid'))
                        <button type="button" class="b1" data-toggle="modal" data-target="#">
                             <a class="nav-link btn-danger " style="font-size:15px;" href="{{URL::to('/delete'.'/'.'test'.'/'.$diagnosis_data->id)}}">Remove</a>
                        </button>
                        @elseif(session()->get('usersname'))
                        <button type="button" class="b1" data-toggle="modal" data-target="#" style="padding-left: 25px">
                            <a href="{{URL::to('/addreport'.'/'.session()->get('usersid').'/'.$diagnosis_data->id)}}" class="btn btn-primary">For Booking<br> Contact Us</a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
