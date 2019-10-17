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
         /* }elseif ($Idate == $date) {
              return redirect('/admin')->with('alert','Your Are Already Absent Today!!!');
          }elseif ($intime >= '09:15:00') {
              return redirect('/admin')->with('alert','Your Are Out Of Time!!!');
          */}else{
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
      //chart
      //operational
      $OF=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('daily.intime',['5:00:00','7:00:00'])->count();
      $OL=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('daily.intime',['12:30:00','24:00:00'])->count();
      $O730=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('daily.intime',['7:00:00','7:30:00'])->count();
      $O8=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('daily.intime',['7:30:00','8:00:00'])->count();
      $O830=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('daily.intime',['8:30:00','9:00:00'])->count();
      $O9=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['8:30:00','9:00:00'])->count();
      $O930=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['9:00:00','9:30:00'])->count();
      $O10=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['9:30:00','10:00:00'])->count();
      $O1030=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['10:00:00','10:30:00'])->count();
      $O11=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['10:30:00','11:00:00'])->count();
      $O1130=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['11:00:00','11:30:00'])->count();
      $O12=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Operational')->whereBetween('intime',['11:30:00','12:00:00'])->count();
      //Sales and Marketing
      $SF=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('daily.intime',['5:00:00','7:00:00'])->count();
      $SL=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('daily.intime',['12:30:00','24:00:00'])->count();
      $S730=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['7:00:00','7:30:00'])->count();
      $S8=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['7:30:00','8:00:00'])->count();
      $S830=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['8:00:00','8:30:00'])->count();
      $S9=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['8:30:00','9:00:00'])->count();
      $S930=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['9:00:00','9:30:00'])->count();
      $S10=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['9:30:00','10:00:00'])->count();
      $S1030=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['10:00:00','10:30:00'])->count();
      $S11=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['10:30:00','11:00:00'])->count();
      $S1130=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['11:00:00','11:30:00'])->count();
      $S12=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Sales and Marketing')->whereBetween('intime',['11:30:00','12:00:00'])->count();
      //Technical
      $TF=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('daily.intime',['5:00:00','7:00:00'])->count();
      $TL=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('daily.intime',['12:30:00','24:00:00'])->count();
      $T730=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['7:00:00','7:30:00'])->count();
      $T8=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['7:30:00','8:00:00'])->count();
      $T830=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['8:00:00','8:30:00'])->count();
      $T9=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['8:30:00','9:00:00'])->count();
      $T930=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['9:00:00','9:30:00'])->count();
      $T10=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['9:30:00','10:00:00'])->count();
      $T1030=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['10:00:00','10:30:00'])->count();
      $T11=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['10:30:00','11:00:00'])->count();
      $T1130=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['11:00:00','11:30:00'])->count();
      $T12=record::RecordDaily($date1,$date2)->where('jabatan.jabatan','Technical')->whereBetween('intime',['11:30:00','12:00:00'])->count();


      if ($hakakses=='admin' OR $hakakses=='super user') {
            if ($nip=='A124') {
              $tbl=$isitbl->where('users.kd','S001')->count();
              $isitbl=$isitbl->where('users.kd','S001')->orderBy('daily.date','desc')->get();
            }elseif ($nip=='A137') {
              $tbl=$isitbl->where('users.kd','T001')->count();
              $isitbl=$isitbl->where('users.kd','T001')->orderBy('daily.date','desc')->get();
            }else{
              $tbl=$isitbl->count();
              $isitbl=$isitbl->orderBy('daily.date','desc')->get();
            }
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
          'OF'=>$OF,
          'OL'=>$OL,
          'SF'=>$SF,
          'SL'=>$SL,
          'TF'=>$TF,
          'TL'=>$TL,
          'O730'=>$O730,
          'O8'=>$O8,
          'O830'=>$O830,
          'O9'=>$O9,
          'O930'=>$O930,
          'O10'=>$O10,
          'O1030'=>$O1030,
          'O11'=>$O11,
          'O1130'=>$O1130,
          'O12'=>$O12,
          'S730'=>$S730,
          'S8'=>$S8,
          'S830'=>$S830,
          'S9'=>$S9,
          'S930'=>$S930,
          'S10'=>$S10,
          'S1030'=>$S1030,
          'S11'=>$S11,
          'S1130'=>$S1130,
          'S12'=>$S12,
          'T730'=>$T730,
          'T8'=>$T8,
          'T830'=>$T830,
          'T9'=>$T9,
          'T930'=>$T930,
          'T10'=>$T10,
          'T1030'=>$T1030,
          'T11'=>$T11,
          'T1130'=>$T1130,
          'T12'=>$T12,
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
