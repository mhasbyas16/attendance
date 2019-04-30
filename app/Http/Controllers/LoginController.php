<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\users;
use App\Helper\record;
use Redirect;

class LoginController extends Controller
{
  public function login(Request $request){
      $username = $request->nip;
      $password = md5($request->password);
      $data = DB::table('users')->where('email',$username);
      $cdata=$data->count();
      $data=$data->first();


      if ($cdata>=1) {
        if($data->email==$username){ //apakah email tersebut ada atau tidak
            //if(hash::check($password,$data->password)){  ---bycript---
             if ($data->password==$password) {
              Session::put('nip',$data->nip);
              Session::put('email',$data->email);
              Session::put('nama',$data->nama);
              Session::put('hakakses',$data->hakakses);
              Session::put('kd',$data->kd);
              Session::put('login',TRUE);
              return redirect('admin');
              }
              else{
              return redirect('/')->with('alert','Try again, your email or password are wrong!');
              }
        }
        else{
          return redirect('/')->with('alert','Try again, your email or password are wrong!');
        }
        }else{
          return redirect('/')->with('alert','Try again, your email or password are wrong!');
    }
  }


  public function BerhasilLogin(){
      if (!Session::get('login')) {
          return redirect('/')->with('alert','Please, login first');
      }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          $jmlusers=users::count();
          $genderL=users::where('gender','Laki-laki')->count();
          $genderP=users::where('gender','Perempuan')->count();
          $jmlO=users::where('kd','O001')->count();
          $jmlS=users::where('kd','S001')->count();
          $jmlT=users::where('kd','T001')->count();

          $operasional=($jmlO/$jmlusers)*100;
          $sales=($jmlS/$jmlusers)*100;
          $technical=($jmlT/$jmlusers)*100;

          if ($hakakses=='admin' OR $hakakses=='super user') {
              $table=record::Daily()->count();
              $Atable=record::Activity()->count();
          }else{

              $table=record::Daily()->where('daily.nip',$nip)->count();
              $Atable=record::Activity()->where('activity.nip',$nip)->count();

          }

          $qD=DB::table('daily')->where('nip',$nip)->orderBy('id','desc')->limit('1');
          $qA=DB::table('activity')->where('nip',$nip)->orderBy('id','desc')->limit('1');

          $maxD=$qD->first();
          $maxA=$qA->first();
          //validasi daily
          if ($qD->count()==0 OR $maxD->outtime !="00:00:00") {
              $tmbl = '';
          }elseif($maxD->outtime =="00:00:00"){
              $tmbl = 'disabled';
          }
          //validasi activity
          if ($qA->count()==0 OR $maxA->outtime !="00:00:00") {
              $tmbll = '';
          }elseif ($maxA->outtime =="00:00:00"){
              $tmbll = 'disabled';
          }

          $cust=DB::table('customer')->orderBY('namapt','asc')->get();

          include 'pesan.php';

              return view("admin.grafik",[
                  'tmbl'=>$tmbl,
                  'tmbll'=>$tmbll,
                  'cust'=>$cust,
                  'status'=>$status,
                  'hakakses'=>$hakakses,
                  'operasional'=>$operasional,
                  'sales'=>$sales,
                  'technical'=>$technical,
                  'jmlO'=>$jmlO,
                  'jmlS'=>$jmlS,
                  'jmlT'=>$jmlT,
                  'genderL'=>$genderL,
                  'genderP'=>$genderP,
                  'table'=>$table,
                  'Atable'=>$Atable,
                  'jmlusers'=>$jmlusers,
                  'maxD'=>$maxD]);

      }
  }

  public function Logout(){
      Session::flush();
      return redirect("/")->with('alert','Logout Success');
  }

  public function web(){
      return Redirect::to('https://www.ib-synergy.co.id');
  }

}
