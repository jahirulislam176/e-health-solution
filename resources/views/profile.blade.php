@extends('index')
@section('middle')
<div class="container">
    @if(!session()->get('adminid'))
        <div class="row profile  mt-4">
            <div class="card col-md-3" style="height:300px;">
                <div class="row">
                    <div class="col-3 d-flex align-items-center flex-column" style="margin-left:100px; height: 250px;">
                        <div class="profile-userpic "style="padding-top: 20px; color:rgba(1,102,140,.95);">
                            <h2><i class="fa fa-user "></i></h2> 
                        </div>
                        <div class="profile-usertitle ">
                            <div class="profile-usertitle-name " style="font-size:30px;">
                                <p style="color:green;">{{session()->get('usersname')}}</p>
                            </div>
                        </div>
                        <div class="profile-usertitle ">
                            <div class="profile-usertitle-name" style="font-size:20px;">
                                <p>{{session()->get('usersemail')}}</p>
                            </div>
                        </div>
                        <div class="profile-userbuttons inline-flex">
                           <a href="{{URL::to('/contact')}}"><button type="button" class="btn-info btn-sm">Contact</button></a>
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="col-md-9"style="padding-left: 150px;">
                <div class="profile-content">
                    <div class="col-12">
                        <div class="profile-usermenu text-center">
                            <i class="glyphicon glyphicon-home"></i>
                            <p><u style="padding-top:4px;">Services Taken</u></p>
                           
                            <div class="row">
                                <div class="col-6">
                                    <h4>Your Medicine</h4>
                                    <table border='2' width="100%">
                                        <tr>
                                            <th>Name</th>
                                            <th>price</th>
                                        </tr>
                                        @foreach($medicines as $medi)
                                        <tr>
                                            <td>{{$medi->medicinename}}</td>
                                            <td>{{$medi->price}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <p>Total:{{$totalmedicine}}</p>
                                </div>
                                <div class="col-6">
                                    <h4>Your Test Report</h4>
                                    
                                    <table border='2' width="100%">
                                        <tr>
                                            <th>Name</th>
                                            <th>price</th>
                                            <th>Test Update</th>
                                        </tr>
                                        @foreach($test as $te)
                                        <tr>
                                            <td>{{$te->testname}}</td>
                                            <td>{{$te->price}}</td>
                                            <td>
                                                @if($te->status == 0)
                                                <p style="color:green">Report Published</p>
                                                @else
                                                <p style="color:red">Report in Process</p>
                                                @endif
                                            </td>
                                        </tr>
                                       @endforeach
                                    </table>
                                    <p>Total:{{$totalbill}}</p>
                                </div>
                            </div>
                            <h3>Total Bill:{{$alltotal}}</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row profile  mt-4">
            <div class="card col-md-3" style="height:300px;">
                <div class="row">
                    <div class="col-3 d-flex align-items-center flex-column" style="margin-left:100px; height: 250px;">
                        <div class="profile-userpic "style="padding-top: 20px; color:rgba(1,102,140,.95);">
                            <h2><i class="fa fa-user "></i></h2> 
                        </div>
                        <div class="profile-usertitle ">
                            <div class="profile-usertitle-name " style="font-size:30px;">
                                <p style="color:green;">{{session()->get('adminname')}}</p>
                            </div>
                        </div>
                        <div class="profile-usertitle ">
                            <div class="profile-usertitle-name" style="font-size:20px;">
                                <p>{{session()->get('adminemail')}}</p>
                            </div>
                        </div>
                        <div class="profile-userbuttons inline-flex">
                           <a href="{{URL::to('/contact')}}"><button type="button" class="btn-info btn-sm">Contact</button></a>
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="col-md-9"style="padding-left: 150px;">
                <div class="profile-content">
                    <div class="col-12">
                        <div class="profile-usermenu text-center">
                            <i class="glyphicon glyphicon-home"></i>
                            <p><u style="padding-top:4px;">Control</u></p>
                           
                            <div class="row">
                                <div class="col-12">
                                    <h4>Medicine Orders</h4>
                                    <table border='2' width="100%">
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>User Name</th>
                                            <th>Price</th>
                                        </tr>
                                        @foreach($allmedicines as $medic)
                                        <tr>
                                            <td>{{$medic->medicinename}}</td>
                                            <td>{{$medic->usersname}}</td>
                                            <td>{{$medic->price}}</td>
                                            <td><a href="{{URL::to('/delete'.'/'.'adminorder'.'/'.$medic->id)}}">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Test Report Update</h4>
                                    
                                    <table border='2' width="100%">
                                        <tr>
                                            <th>User Name</th>
                                            <th>Test Name</th>
                                            <th>Test Update</th>
                                        </tr>
                                        @foreach($alltest as $tes)
                                        <tr>
                                            <td>{{$tes->usersname}}</td>
                                            <td>{{$tes->testname}}</td>
                                            <td>
                                                @if($tes->status == 1)
                                                <a href="{{URL::to('status-1'.'/'.'admintest'.'/'.$tes->id)}}">Allowed</a>
                                                @else
                                                <a href="{{URL::to('status-0'.'/'.'admintest'.'/'.$tes->id)}}">Pending</a>
                                                @endif
                                            </td>
                                        </tr>
                                       @endforeach
                                    </table>
                                    
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
    <br>
    <br>
    @endsection