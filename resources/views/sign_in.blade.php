@extends('index')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}/public/style/css/register.css">
@endsection
@section('middle')
<section class="caption">
    <div class="container">
        <div class="row">
            <div class="mx-auto pt-5">
               <h1>Admin Login</h1> 
               <hr>
            </div>
        </div>
    </div>
</section>
    <div class="row">
    <div class="col-md-6 mx-auto py-2">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                    <div class="login-space">
                        <div class="login">
                            <p style='color:red'><?php echo session()->get('loginmsg');
                            session()->put('loginmsg', ''); ?></p>
                            <form method="post" action="{{URL::to('/login-do')}} ">
                                
                                @csrf
                                <div class="group"> <label for="useremain" class="label">Email</label> <input autocomplete="off" name="email" id="user" type="email" class="input" placeholder="Enter your Email"> </div>
                                <div class="group"> <label for="userpass" class="label">Password</label> <input name="pass" id="pass" type="password" class="input" data-type="password" placeholder="Enter your password"> </div>
                                <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
                                <div class="group"> <input type="submit" class="button" value="LogIn"> </div>
                                <div class="hr"></div>
                                <div class="foot"> <a href="#">Forgot Password?</a> </div>
                            </form>
                        </div>
                        <div class="sign-up-form">
                            <p style='color:red'><?php echo session()->get('error');
                            session()->put('error', ''); ?></p>
                            <form method="post" action="{{URL::to('/save-admin')}}">
                                @csrf
                                <div class="group"> <label for="username" class="label">Username</label> <input autocomplete="off" name="adminname" id="user" type="text" class="input" placeholder="Create your Username"> </div>
                                <div class="group"> <label for="useremail" class="label">Email Address</label> <input autocomplete="off" name="adminemail" id="pass" type="email" class="input" placeholder="Enter your email address"> </div>
                                <div class="group"> <label for="userpass" class="label">Password</label> <input  name="pass" id="pass" type="password" class="input" data-type="password" placeholder="Create your password"> </div>
                                <div class="group"> <label for="userpass" class="label">Repeat Password</label> <input autocomplete="off" name="passcon" id="pass" type="password" class="input" data-type="password" placeholder="Repeat your password"> </div>
                                <div class="group"> <input type="submit" class="button" value="Sign Up"> </div>
                                <div class="hr"></div>
                                <div class="foot"> <label for="tab-1">Already Member?</label> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
