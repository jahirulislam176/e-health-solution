<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class main_controller extends Controller{

    function login_do(Request $request){
        $logindata = DB::table('admin')->where('adminemail', $request->email)->where('adminpass', md5($request->pass))->first();
        if ($logindata) {
            $data = array();
            $data['adminid'] = $logindata->adminid;
            $data['adminname'] = $logindata->adminname;
            $data['adminemail'] = $logindata->adminemail;
            session()->put($data);
            return redirect('/');
        } else {
            session()->put('loginmsg', 'your email or password invalid!!!');
            return redirect('/sign-in');
        }
    }
    function login_user(Request $request) {
        $logindata = DB::table('userss')->where('usersemail', $request->usersemail)->where('userspass', md5($request->userspass))->first();
        if ($logindata) {
            $data = array();
            $data['usersid'] = $logindata->usersid;
            $data['usersname'] = $logindata->usersname;
            $data['usersemail'] = $logindata->usersemail;
            session()->put($data);
            return redirect('/');
        } else {
            session()->put('loginmsg', 'your email or password invalid!!!');
            return redirect('/login-user');
        }
    }
    function index() {
        $blog_data = DB::table('blog')->where('blogstatus', 1)->limit(4)->get();
        $doctor_data = DB::table('doctor')->where('doctorstatus', 1)->get();
        $doctor_top = DB::table('doctor')->where('doctorstatus', 1)->limit(4)->get();
        //
        $banner = DB::table('slide')->where('bannerposition', 1)->get();
        $home = view('home')->with('c', $blog_data)
                ->with('b', $banner)
                ->with('taf', $doctor_data)
                ->with('taffa', $doctor_top);
        return view('index')->with('home', $home);
    }

    function blood() {
        $banner = DB::table('slide')->where('bannerposition', 2)->get();
        $doner_data = DB::table('doner')->get();
        $blood = view('blood')->with('doner_data', $doner_data)->with('b', $banner);
        return view('index')->with('blood', $blood);
    }

    public function cart() {
        $data = DB::table('cart_details')->where('userid', session()->get('usersid'))
                ->join('medicine', 'cart_details.medicineid', 'medicine.id')
                ->select('cart_details.*', 'medicine.*')
                ->get();
        $total = DB::table('cart_details')->where('userid', session()->get('usersid'))->sum('cart_details.price');
        $cart = view('cart')->with('cart_data', $data)->with('total', $total);
        return view('index')->with('cart', $cart);
    }

    function contact() {
        $data = DB::table('tbl_contacts')->get();
        $meetlink = DB::table('meetlink')->get();
        $contact = view('contact')->with('message',$data)->with('mitl',$meetlink);
        return view('index')->with('contact', $contact);
    }

    function profile() {
        $medicine = DB::table('cart_details')->where('userid', session()->get('usersid'))
                ->join('medicine', 'cart_details.medicineid', 'medicine.id')
                ->select( 'medicine.*')
                ->get();
        $total_medicine = DB::table('cart_details')->where('userid', session()->get('usersid'))->sum('cart_details.price');

        $report = DB::table('report')->where('userid', session()->get('usersid'))
                ->join('diagnosis', 'report.testid', 'diagnosis.id')
                ->select( 'diagnosis.*','report.status')
                ->get();
        $total_test = DB::table('report')->where('userid', session()->get('usersid'))->sum('report.bill');

        $all_total = $total_medicine + $total_test;


        $allmedicines = DB::table('cart_details')
                ->join('medicine','cart_details.medicineid','medicine.id')
                ->join('userss','cart_details.userid','userss.usersid')
                ->select('cart_details.*','medicine.medicinename','userss.usersname')
                ->get();
        $allreport = DB::table('report')
                ->join('diagnosis','report.testid','diagnosis.id')
                ->join('userss','report.userid','userss.usersid')
                ->select('report.*','diagnosis.testname','userss.usersname')
                ->get();


        $profile = view('profile')
                ->with('medicines',$medicine)
                ->with('totalmedicine', $total_medicine)
                ->with('test',$report)
                ->with('totalbill', $total_test)
                ->with('alltotal',$all_total)
                ->with('allmedicines',$allmedicines)
                ->with('alltest',$allreport);

        return view('index')->with('profile', $profile);
    }
    function user_login() {
        $user_login = view('user_login');
        return view('index')->with('user_login', $user_login);
    }

    function blog() {
        if (session()->get('adminid')) {
            $blog_data = DB::table('blog')->get();
            //where('blogstatus',1)->
        } else {
            $blog_data = DB::table('blog')->where('blogstatus', 1)->get();
            //
        }
        $banner = DB::table('slide')->where('bannerposition', 4)->get();
        $blog = view('blog')->with('c', $blog_data)
                ->with('b', $banner);
        return view('index')->with('blog', $blog);
    }

    function medicine() {
        $banner = DB::table('slide')->where('bannerposition', 3)->get();
        $medicine_data = DB::table('medicine')->get();
        $medicine = view('medicine')->with('medicine_data', $medicine_data)
                ->with('b', $banner);
        return view('index')->with('medicine', $medicine);
    }

    function diagnosis() {
        $diagnosis_data = DB::table('diagnosis')->get();
        $diagnosis = view('diagnosis')->with('diagnosic', $diagnosis_data);
        return view('index')->with('diagnosis', $diagnosis);
    }
    function sign_in() {
        return view('sign_in');
    }

    function login() {
        return view('login');
    }

    function sign_out() {
        session()->flush();
        return redirect('/');
    }

    function save_doner(Request $request) {
        $data = array();
        $data['donername'] = $request->doner_name;
        $data['phone'] = $request->phone;
        $data['location'] = $request->location;
        $data['blood'] = $request->blood;
        DB::table('doner')->insert($data);
        return redirect('/blood');
    }

    function save_medicine(Request $request) {
        $data = array();
        $data['medicinename'] = $request->name;
        $data['price'] = $request->price;
        $data['info'] = $request->info;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/style/uploads/';
            $file->move($fileurl, $fileName);
            $data['image'] = $fileurl . $fileName;
        }
        $data['type'] = $request->type;
        DB::table('medicine')->insert($data);
        return redirect('/medicine');
    }

    function save_diagnosis(Request $request) {
        $data = array();
        $data['testname'] = $request->name;
        $data['price'] = $request->price;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/style/uploads/';
            $file->move($fileurl, $fileName);
            $data['image'] = $fileurl . $fileName;
        }
        $data['info'] = $request->info;
        $data['type'] = $request->type;
        DB::table('diagnosis')->insert($data);
        return redirect('/diagnosis');
    }
    function save_banner(Request $request) {
        $data = array();
        $data['bannername'] = $request->name;
        if ($request->hasFile('bannerimage')) {
            $file = $request->file('bannerimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/style/uploads/';
            $file->move($fileurl, $fileName);
            $data['bannerimage'] = $fileurl . $fileName;
        }
        $data['bannerposition'] = $request->bannerposition;
        DB::table('slide')->insert($data);
        return redirect('/');
    }

    function save_blog(Request $request) {
        $data = array();
        $data['blogheading'] = $request->blogheading;
        if ($request->hasFile('blogimage')) {
            $file = $request->file('blogimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/style/uploads/';
            $file->move($fileurl, $fileName);
            $data['blogimage'] = $fileurl . $fileName;
        }
        $data['bloginfo'] = $request->bloginfo;
        $data['blogstatus'] = $request->blogstatus;
        DB::table('blog')->insert($data);
        return redirect('/blog');
    }

    function save_doctor(Request $request) {
        $data = array();
        $data['name'] = $request->name;
        if ($request->hasFile('doctorimage')) {
            $file = $request->file('doctorimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/style/uploads/';
            $file->move($fileurl, $fileName);
            $data['doctorimage'] = $fileurl . $fileName;
        }
        $data['phone'] = $request->phone;
        $data['location'] = $request->location;
        $data['doctorstatus'] = $request->doctorstatus;
        DB::table('doctor')->insert($data);
        return redirect('/');
    }

    function save_admin(Request $request) {

        $data = array();
        $data['adminname'] = $request->adminname;
        $data['adminemail'] = $request->adminemail;
        if ($request->pass == $request->passcon) {
            $data['adminpass'] = MD5($request->pass);
            DB::table('admin')->insert($data);
        } else {
            session()->put('error', 'Password does not matched');
        }
        return redirect('/sign-in');
    }

//    function save_user(Request $request) {
//
//        $data = array();
//        $data['username'] = $request->name;
//        $data['age'] = $request->age;
//        DB::table('user')->insert($data);
//        return redirect('/medicine');
//    }

    function save_user(Request $request) {
        $data = DB::table('userss')->where('usersname', $request->usersname)->where('usersemail', $request->usersemail)->first();
        if (!$data){
            $data1 = array();
            $data1['usersname'] = $request->usersname;
            $data1['usersemail'] = $request->usersemail;
            if($request->userspass == $request->passcon)
            {
                $data1['userspass'] = md5($request->userspass);
            }
            else{
                session()->put('Reg_Error','Password incorrect');
            }
            DB::table('userss')->insert($data1);
            return redirect('/user-login');

        } else {
            session()->put('error', 'register first');
        }
        return redirect('/user-login');
    }

    function add2cart($userId, $medicineId) {

        $medicine_data = DB::table('medicine')->where('id', $medicineId)->first();
        if ($medicine_data) {
            $data = array();
            $data['userid'] = $userId;
            $data['medicineid'] = $medicineId;
            $data['price'] = $medicine_data->price;
            DB::table('cart_details')->insert($data);
            return redirect('/medicine');
        } elseif ($medicine_data) {
            session()->put('error', 'you already done');
            return redirect('/cart');
        }
//        return redirect('/medicine');
    }
    function addreport($userid, $diagnosisid) {

        $diagnosis_data = DB::table('diagnosis')->where('id', $diagnosisid)->first();
        if ($diagnosis_data) {
            $data = array();
            $data['userid'] = $userid;
            $data['testid'] = $diagnosisid;
            $data['bill'] = $diagnosis_data->price;
            DB::table('report')->insert($data);
            return redirect('/diagnosis');
        } else{
            session()->put('error', 'something wrong');
            return redirect('/medicine');
        }
//        return redirect('/medicine');
    }
    function save_contacts(Request $request) {
        $data = array();
        $data['name'] = session()->get('usersname');
        $data['email'] = session()->get('usersemail');
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        DB::table('tbl_contacts')->insert($data);
        return redirect('/contact');
    }
    function meetlink(Request $request) {
        $data = array();
        $data['dname'] = session()->get('dname');
        $data['meetlink'] = session()->get('meetlink');
        $data['dname'] = $request->dname;
        $data['meetlink'] = $request->meetlink;
        DB::table('meetlink')->insert($data);
        return redirect('/contact');
    }
    function status_0($from, $id) {
        if ($from == 'blog') {
            DB::table('blog')->where('id', $id)->update(array('blogstatus' => 1));
            return redirect('/blog');
        }if ($from == 'admintest') {
            DB::table('report')->where('id', $id)->update(array('status' => 1));
            return redirect('/profile');
        }
    }

    function status_1($from, $id) {
        if ($from == 'blog') {
            DB::table('blog')->where('id', $id)->update(array('blogstatus' => 0));
            return redirect('/blog');
        }if ($from == 'admintest') {
            DB::table('report')->where('id', $id)->update(array('status' => 0));
            return redirect('/profile');
        }
    }
    function delete($from, $id) {
        if ($from == 'medicine') {
            DB::table('medicine')->where('id', $id)->delete();
            return redirect('/medicine');
        }
        if ($from == 'blog') {
            DB::table('blog')->where('id', $id)->delete();
            return redirect('/blog');
        }if ($from == 'doner') {
            DB::table('doner')->where('id', $id)->delete();
            return redirect('/blood');
        }if ($from == 'cart_data') {
            DB::table('cart_details')->where('id', $id)->delete();
            return redirect('/cart');
        }
        if ($from == 'adminorder') {
            DB::table('cart_details')->where('id', $id)->delete();
            return redirect('/profile');
        }
        if ($from == 'message') {
            DB::table('tbl_contacts')->where('id', $id)->delete();
            return redirect('/contact');
        }
        //amr kora
        if ($from == 'test') {
            DB::table('diagnosis')->where('id', $id)->delete();
            return redirect('/diagnosis');
        }
        if ($from == 'mtl') {
            DB::table('meetlink')->where('id', $id)->delete();
            return redirect('/contact');
        }
    }
}
