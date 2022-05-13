@extends('index')
@section('middle')
<section class="ftco-section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                @if(session()->get('usersid'))
                <h2 class="heading-section">Contact Us</h2>
                @else
                <h2 class="heading-section">Messages</h2>
                @endif
                <hr>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-3 con1">
                <div class="dbox w-100 text-center" style="text-decoration: none;">
                    <div class="icon d-flex align-items-center justify-content-center" style="font-size:50px; color:#009900;text-decoration: none;">
                        <span></span> <a href="https://www.google.com/maps/place/%E0%A6%A2%E0%A6%BE%E0%A6%95%E0%A6%BE/@23.7687236,90.4099966,18.19z/data=!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.810332!4d90.4125181"><i class="fa fa-map"></i></a></span>
                    </div>
                    <div class="text">
                        <p><span></span> <a href="https://bit.ly/2VATNB6">Our Location</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 con1">
                <div class="dbox w-100 text-center" style="text-decoration: none;">
                    <div class="icon d-flex align-items-center justify-content-center" style="font-size:50px; color:#009900;text-decoration: none;">
                        <span></span> <a href="https://bit.ly/2VATNB6"><i class="fab fa-whatsapp"></i></a></span>
                    </div>
                    <div class="text">
                        <p><span></span> <a href="https://bit.ly/2VATNB6">Meet A Doctor</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 con1">
                <div class="dbox w-100 text-center" style="text-decoration: none;">
                    <div class="icon d-flex align-items-center justify-content-center" style="font-size:50px; color:#009900;text-decoration: none;">
                        <span></span> <a href=""><i class="fa fa-phone"></i></a></span>
                    </div>
                    <div class="text">
                        <p><span></span> <a href="">Give a Shot Call:+880 1000-000000</a></p>

                    </div>
                </div>
            </div>
            <div class="col-md-3 con1">
                <div class="dbox w-100 text-center" style="text-decoration: none;">
                    <div class="icon d-flex align-items-center justify-content-center" style="font-size:50px; color:#009900;text-decoration: none;">
                        <span></span> <a href="https://www.facebook.com/lisan.nasil.73/"><i class="fab fa-facebook"></i></a></span>
                    </div>
                    <div class="text">
                        <p><span></span> <a href="https://www.facebook.com/lisan.nasil.73/">Contact On Facebook</a></p>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->get('adminid'))
        <form method="POST" action="{{URL::to('/meetlink')}}">
            @csrf
            <table  width="100%">
                <tr>
                    <td><h5>Doctor Name: <input type="text" name="dname" placeholder="Doctor Name"></h5></td>    
                </tr>
                <tr>
                <h5>Meet Link For Meeting</h5>
                <th>Meet link : <input type="text" name="meetlink" placeholder="Generate Meet link"> <button class="btn bg-success text-light" type="submit">Submit</button></th>
                </tr> 
            </table>
        </form>
        @endif
        @if(!session()->get('adminid'||'usersid'))

        <table  width="100%">
            @foreach($mitl as $mt)
            <tr>
            
            <th><h5>Doctor Name: {{$mt->dname}}</h5></th>    
            </tr> 
            <tr><th>Meet link :<a href="{{$mt->meetlink}}"> meetlink</a></th></tr>
            @if(session()->get('adminid'))
            <td style="width:100px;height:10px;overflow:hidden"><a href="{{URL::to('/delete'.'/'.'mtl'.'/'.$mt->id)}}"><button class="btn bg-danger text-light">Delete</button></a></td>
            @endif
            @endforeach
        </table>
        @endif
        <div class="row justify-content-center con1">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row">
                        @if(session()->get('usersid'))
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Contact Us</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div>
                                <form method="POST" action="{{URL::to('/save-contacts')}}" id="contactForm">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Subject</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Message</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <button type="submit" class="btn btn-danger m-auto">Post</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                        @foreach($message as $kakak)
                        <div class="col-6 bg-light">
                            <h2>{{$kakak->subject}}</h2>
                            <h4>{{$kakak->name}}</h4>
                            <p>{{$kakak->message}}</p>
                            <a href="{{URL::to('/delete'.'/'.'message'.'/'.$kakak->id)}}">Delete</a>
                        </div>
                        @endforeach
                        @endif
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" style="background-image: url(img/d1.jpg);">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection