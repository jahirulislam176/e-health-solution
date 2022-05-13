@extends('index')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}/public/style/css/blg.css">
@endsection
@section('middle')
@if(!session()->get('adminid'))
    <section class="banner">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($b as $ba)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{$ba->bannerimage}}" alt="First slide" style="height:400px;overflow-y: hidden">
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
        </div>
    </section>
@else
<div class="contact bg-light" >
        <div class="container text-white py-5">
            <h1 class="text-center" style="text-shadow:0 0 3px #000;">Post Blog</h1>
            <form method="post" action="{{URL::to('/save-blog')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                <div class="col-3">
                  <input type="text" class="form-control" name="blogheading" id="exampleFormControlInput1" placeholder="Heading">
                </div>
                <div class="col-6">
                    <label class="custom-file-label" for="customFile">Select Image</label>
                    <input type="file" class="custom-file-input" id="customFile" name="blogimage">
                 </div>
                <div class="col-3">
                  <select id="exampleFormControlInput2" name="blogstatus" class="custom-select custom-select-sm">
                    <option value="1">Post</option>
                    <option value="0">Pending</option>
                  </select>
                </div>
                </div>
                <div class="form-row my-3">
                  <label for="exampleFormControlTextarea1">Write your Article</label>
                  <textarea class="form-control" name="bloginfo" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
                
                <div class="form-row">
                  <button type="submit" class="btn btn-primary">Post</button>
                </div>
                
              </form>
        </div>
    </div>
@endif
    <section class="details-card blg mt-3">
        <div class="container">
            <div class="row">
                 @foreach($c as $kasas)
                <div class="col-md-4">
                    <div class="card-content">
                        <div class="card-img">
                            <img class="img-fluid" src="{{$kasas->blogimage}}" alt="a" style="height: 250px">
                            <span>
                                {{$kasas->blogheading}}
                            </span>
                        </div>
                        <div class="card-desc">
                            <h3>{{$kasas->blogheading}}</h3>
                            <p>{{$kasas->bloginfo}}</p>
                            @if(session()->get('adminid'))
                                @if($kasas->blogstatus == 0)
                                    <a href="{{URL::to('/status-0'.'/'.'blog'.'/'.$kasas->id)}}" class="btn-card" style="color:red"><i class="far fa-thumbs-up"></i></a>
                                @else
                                    <a href="{{URL::to('/status-1'.'/'.'blog'.'/'.$kasas->id)}}" class="btn-card"><i class="far fa-thumbs-up"></i></a>
                                @endif
                                <a href="{{URL::to('/delete'.'/'.'blog'.'/'.$kasas->id)}}" class="btn-card"><i class="far fa-trash-alt"></i></a>
                            @else
                            
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
   @endsection