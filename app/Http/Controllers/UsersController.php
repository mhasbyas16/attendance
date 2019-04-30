<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\Helper\record;
use App\users;
use App\jabatan;
use Mail;
use App\Mail\ForgotPassword;
use App\Mail\SecurityAlert;


class UsersController extends Controller
{


  public function CIn(Request $req){
      $nip = Session::get('nip');
      $hakakses = Session::get('hakakses');
      $now = \Carbon\Carbon::now('Asia/Jakarta');
      $date=$now->format('Y-m-d');
      $intime = $now->format('H:i:s');
      $Idate = $req->Idate;
      $loc=$req->loc;

      if (isset($req->checkin)) {
          if ($loc=='') {
              return redirect('/admin')->with('alert','Your Location Is Not Recognize !!!');
          }elseif ($Idate == $date) {
              return redirect('/admin')->with('alert','Your Are Already Absent Today!!!');
          }elseif ($intime >= '09:15:00') {
              return redirect('/admin')->with('alert','Your Are Out Of Time!!!');
          }else{
          $save=['nip'=>$nip,'date'=>$date,'intime'=>$intime,'locin'=>$loc,'outtime'=>'00:00:00','locout'=>'','note'=>''];

          DB::table('daily')->insert($save);
          return redirect('/admin')->with('successalert','Success Check In');
          }
      }elseif (isset($req->checkout)) {
          if ($loc=='') {
              return redirect('/admin')->with('alert','Your Location Is Not Recognize !!!');
          }else{
          $edit=['outtime'=>$intime,'locout'=>$loc];
          $max=DB::table('daily')->select(DB::raw('max(id) as max'))->where('nip',$nip)->first();
          DB::table('daily')->where('id',$max->max)->update($edit);
          return redirect('/admin')->with('successalert','Success Check Out');
      }
      }

  }

  public function AIn(Request $req){
      $nip = Session::get('nip');
      $hakakses = Session::get('hakakses');
      $now = \Carbon\Carbon::now('Asia/Jakarta');
      $date=$now->format('Y-m-d');
      $intime = $now->format('H:i:s');
      $loc=$req->loc;
      $desc=$req->description;
      $cust=$req->customer;
      //FOTO



      if (isset($req->activityin)) {
          if ($loc=='') {
              return redirect('/admin')->with('alert','Your Location Is Not Recognize !!!');
          }else{

          $img=$req->file('image');
          $Nimg=$img->getClientOriginalName();
          $img->move(public_path().'/image',$Nimg);

          $save=['nip'=>$nip,'date'=>$date,'intime'=>$intime,'locin'=>$loc,'outtime'=>'00:00:00','locout'=>'','subject'=>$desc,'description'=>'','pic'=>$Nimg,'customer'=>$cust];

          DB::table('activity')->insert($save);
          return redirect('/admin')->with('successalert','Success Check In');
              }
      }elseif (isset($req->activityout)) {
          if ($loc=='') {
              return redirect('/admin')->with('alert','Your Location Is Not Recognize !!!');
          }else{
          $edit=['outtime'=>$intime,'locout'=>$loc,'description'=>$desc];
          $max=DB::table('activity')->select(DB::raw('max(id) as max'))->where('nip',$nip)->first();
          DB::table('activity')->where('id',$max->max)->update($edit);
          return redirect('/admin')->with('successalert','Success Check Out');
      }
      }

  }

  public function Addcust(Request $req){
    $cust =$req->addcust;

    $save=['namapt'=>$cust];
    DB::table('customer')->insert($save);
    return Redirect ('/admin')->with('successalert','Success Add Customer');
  }

      public function ViewEdit($id){
          $view=users::join('jabatan','users.kd','=','jabatan.kd')->where('nip',$id)->first();
          $jabatan=jabatan::all();
          $hakakses = Session::get('hakakses');
          return view('admin.edit_karyawan',[
              'view'=>$view,
              'jabatan'=>$jabatan,
              'hakakses'=>$hakakses,
              'navhome'=>'',
              'navpresence'=>'',
              'navactivity'=>'',
              'navemployee'=>'btn-light btn']);
      }

      public function SaveEdit(Request $req){
          $nip=$req->nip;
          $nama=$req->nama;
          $gender=$req->gender;
          $email=$req->email;
          $jabatan=$req->jabatan;
          $password=md5($req->password);
          $password2=md5($req->password2);

          if ($password=='') {
              $save=['nip'=>$nip,
              'nama'=>$nama,
              'gender'=>$gender,
              'email'=>$email,
              'kd'=>$jabatan];

              users::where('nip',$nip)->update($save);
              return redirect('/viewemployee');
          }elseif ($password==$password2) {
              $save=['nip'=>$nip,
              'gender'=>$gender,
              'nama'=>$nama,
              'email'=>$email,
              'kd'=>$jabatan,
              'password'=>$password];

              users::where('nip',$nip)->update($save);
              return redirect('/viewemployee');
          }elseif ($password!=$password2) {
              return redirect('/edit/'.$nip.'')->with('alert','Password Not Same !');
          }
      }

      public function ViewEmp(){
      if (!Session::get('login')) {
              return redirect('/')->with('alert','login terlebih dahulu');
          }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          $isi=users::join('jabatan','users.kd','=','jabatan.kd')->get();

          include 'pesan.php';
          return view('admin.data_employee',[
              'isi'=>$isi,
              'status'=>$status,
              'hakakses'=>$hakakses,
              'navhome'=>'',
              'navpresence'=>'',
              'navactivity'=>'',
              'navemployee'=>'btn-light btn']);
      }
  }

  public function SearchActivity(Request $req){
      if (!Session::get('login')) {
          return redirect('/')->with('alert','login terlebih dahulu');
      }else{
      $nip = Session::get('nip');
      $hakakses = Session::get('hakakses');
      $date1 =$req->date1;
      $date2 =$req->date2;
      $tahun=date('Y');
      $bulan=date('m');
      include "bulan.php";
      include "pesan.php";
      $isitbl=record::RecordActivity($date1,$date2);
      if ($hakakses=='admin' OR $hakakses=='super user') {
              $tbl=$isitbl->count();
              $isitbl=$isitbl->orderBy('activity.date','desc')->get();
          }else{
              $tbl=$isitbl->where('users.nip',$nip)->count();
              $isitbl=$isitbl->where('users.nip',$nip)->orderBy('activity.date','desc')->get();
          }

      return view('admin.record_activity',[
          'date1'=>$date1,
          'date2'=>$date2,
          'tahun'=>$tahun,
          'bulan'=>$bulan,
          'ANbulan'=>$ANbulan,
          'Abulan'=>$Abulan,
          'bbulan'=>$bbulan,
          'isitbl'=>$isitbl,
          'tbl'=>$tbl,
          'status'=>$status,
          'hakakses'=>$hakakses,
          'navhome'=>'',
          'navpresence'=>'',
          'navactivity'=>'btn-light btn',
          'navemployee'=>'']);
      }
  }

  public function ViewRecord(Request $req){
      if (!Session::get('login')) {
          return redirect('/')->with('alert','login terlebih dahulu');
      }else{
      $nip = Session::get('nip');
      $hakakses = Session::get('hakakses');
      $date1 =$req->date1;
      $date2 =$req->date2;
      $tahun=date('Y');
      $bulan=date('m');
      include "bulan.php";
       include 'pesan.php';
      $isitbl=record::RecordDaily($date1,$date2);

      if ($hakakses=='admin' OR $hakakses=='super user') {
              $tbl=$isitbl->count();
              $isitbl=$isitbl->orderBy('daily.date','desc')->get();
          }else{
               $tbl=$isitbl->where('users.nip',$nip)->count();
              $isitbl=$isitbl->where('users.nip',$nip)->orderBy('daily.date','desc')->get();
          }
      return view('admin.recordpresence',[
          'date1'=>$date1,
          'date2'=>$date2,
          'tahun'=>$tahun,
          'bulan'=>$bulan,
          'ANbulan'=>$ANbulan,
          'Abulan'=>$Abulan,
          'bbulan'=>$bbulan,
          'isitbl'=>$isitbl,
          'tbl'=>$tbl,
          'status'=>$status,
          'hakakses'=>$hakakses,
          'navhome'=>'',
          'navpresence'=>'btn-light btn',
          'navactivity'=>'',
          'navemployee'=>'']);
      }
  }

  public function forgotpassword(request $req){
      $email = $req->email;
      $sub = $req->Subject;
      $dbusers=DB::table('users')->where('email',$email);
      $count=$dbusers->count();
      $cariemail=$dbusers->first();


      if ($count==0) {
          return redirect ('/')->with('alert',"Your Email ".$email." Can't Be Found");
      }elseif ($cariemail->email==$email) {
          $nm=$cariemail->nama;
          Mail::to($email)->send(new SecurityAlert($nm,$email,$sub));
          return redirect ('/')->with('alert',"Your Message Has Been Sent, Check Your Email");
      }

  }

  public function resetpassword($nm,$email,$sub){

          $save=['email'=>$email,'subject'=>$sub,'status'=>'','description'=>''];

          $simpan=DB::table('service')->insert($save);
          $newpass= str_random(8);
          $spass=md5($newpass);
          DB::table('users')->update(['password'=>$spass]);
          Mail::to($email)->send(new ForgotPassword($nm,$email,$newpass));
          return redirect ('/')->with('alert',"Your Message Has Been Sent, Check Your Email For New Password");
  }

}
