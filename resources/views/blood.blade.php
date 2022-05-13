@extends('index')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}/public/style/css/blood.css">
@endsection
@section('middle')

<section class="">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{asset('/')}}/public/style/img/blood0.webp" class="img-fluid" style="border-radius: 40px" alt="">
            </div>
            <div class="col-lg-6 text-center">
                <h1 class="py-5 text-center" style="color:#007b5e"><b>World Blood Donor Day</b></h1>
                <p class="text-center pl-5 "style="color:#888888">Take one famous song – ‘Give Blood’, by world renowned musician and former member of the band ‘The Who’, Pete Townshend.
                    Tweak the lyrics so it even better more powerfully  communicates the wonder of blood donation.
                    Make multiple, world-music, recordings by leading artists, singing their own arrangements in multiple languages.
                    Set these songs to a bespoke, motivational video.
                    Make these materials available for blood services worldwide to use to enhance their World Blood Donor Day celebrations.</p>

            </div>

        </div>
    </div>
</section>


<div class="container" style="">
    <!--    <h1 class="ml-2" style="color: aqua">Search For Blood:</h1>
        <div class="col-lg-3" style="text-align: center;">
            <input type="search" class="form-control text-center" id="input-search" placeholder="Blood Group">
            <input type="search" class="form-control my-4 text-center" id="input-search" placeholder="Location">
            <button class="btn btn-info" style="">Search</button>
        </div>-->
    <div class="col-lg-12 text-center"><h3 class="mx-12" style="color: #007b5e">List Of Blood Donor:</h3><hr></div>
    

    <div class="row bld" style="">
        @foreach($doner_data as $doner)
        <div class="items col-xs-6 col-sm-6 col-md-6 col-lg-6 clearfix">
            <div class="info-block block-info clearfix">
                <div class="row">
                    <div class="square-box pull-left">

                        @if(session()->get('adminid'))
                        <span><a style="font-size: 30px;color:#fff;" href="{{URL::to('/delete'.'/'.'doner'.'/'.$doner->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                        @else
                        <span class=""><i class="fas fa-user-alt"></i></span>
                        @endif
                    </div>
                    <div class="doner">
                        <h5>Name: {{$doner->donername}}</h5>
                        <h5>Location: {{$doner->location}}</h5>
                        <span >Blood Group: {{$doner->blood}}</span><br>
                        <span>Phone: {{$doner->phone}}</span>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
<section class="" style="background-color:#99ff99">
    <div class="container my-1">
        <div class="row py-3">
            <div class="col-lg-3 ">
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"style="color:#2f4d12">If You Want To Become A Donor<br><small>Please sign up</small></h3>
                    </div>
                    <div class="panel-body ">
                        <form method="POST" action="{{URL::to('save-doner')}}" style="">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="doner_name" id="text" class=" col-sm-7 col-md-7 form-control input-sm" placeholder="Enter Your Name"/>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="text" class=" col-sm-7 col-md-7 form-control input-sm" placeholder="Phone Number"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="location" id="text" class=" col-sm-7 col-md-7 form-control input-sm" placeholder="Location"/>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 col-md-7">
                                    <div class="form-group px-auto">
                                        <div class="dropdown mt-3 p-1 bgroup"  style="border-radius:20%" >
                                            <label for="blood" class=""><b>Blood-Group </b> </label>
                                            <select id="blood" name="blood" class="mx-4 px-4">
                                                <option value="A+"> A+</option>
                                                <option value="A-"> A-</option>
                                                <option value="B+"> B+</option>
                                                <option value="B-"> B-</option>
                                                <option value="O+"> O+</option>
                                                <option value="O-"> O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-"> AB-</option>
                                                <option value="Unknown"> Unknown</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Register" class="btn btn-info btn-block col-sm-7 col-md-7"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                
            </div>
        </div>
    </div>
</section>


@endsection

