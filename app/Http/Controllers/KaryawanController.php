<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\Helper\record;

class KaryawanController extends Controller
{
  public function HomeK(){
      if (!Session::get('login')) {
          return redirect('/')->with('alert','Please, login first');
      }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          //$isi = DB::table('users')->join('jabatan','users.kd','=','jabatan.kd')->where('users.nip',$nip)->first();
          $tgls = date('Y-m-d');
          $table = record::Daily();
    $Atable=record::Activity();

          include 'pesan.php';

              $jmltable=$table->where('daily.nip',$nip)->count();
              $table=$table->where('daily.nip',$nip)->get();
              $jmlAtable=$Atable->where('activity.nip',$nip)->count();
              $Atable=$Atable->where('activity.nip',$nip)->get();



              return view("admin.homeA",[
                  'table'=>$table,
                  'jmltable'=>$jmltable,
        'Atable'=>$Atable,
                  'status'=>$status,
                  'jmlAtable'=>$jmlAtable,
                  'hakakses'=>$hakakses,
                  'navhome'=>'btn-light btn',
                  'navpresence'=>'',
                  'navactivity'=>'',
                  'navemployee'=>'']);
          }

      }

      public function RecordK(){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','Please, Login First');
          }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          $date1=date('Y-m').'-01';
          $date2=date('Y-m').'-31';
          include "bulan.php";
          $isitbl=record::RecordDaily($date1,$date2);

                  $tbl=$isitbl->where('users.nip',$nip)->count();
                  $isitbl=$isitbl->where('users.nip',$nip)->orderBY('daily.date','desc')->get();
          include 'pesan.php';

          return view('admin.recordpresence',[
              'date1'=>$date1,
              'date2'=>$date2,
              //'bulan'=>$bulan,
              'ANbulan'=>$ANbulan,
              'Abulan'=>$Abulan,
              'bbulan'=>$bbulan,
              'isitbl'=>$isitbl,
              'status'=>$status,
              'tbl'=>$tbl,
              'hakakses'=>$hakakses,
              'navhome'=>'',
              'navpresence'=>'btn-light btn',
              'navactivity'=>'',
              'navemployee'=>'']);
          }
      }

      public function ViewActivityK(){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','login terlebih dahulu');
          }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          $date1=date('Y-m').'-01';
          $date2=date('Y-m').'-31';
          include "bulan.php";
          $isitbl=record::RecordActivity($date1,$date2);
          include 'pesan.php';
          if ($hakakses=='admin' OR $hakakses=='super user') {
                  $tbl=$isitbl->count();
                  $isitbl=$isitbl->orderBY('activity.date','desc')->get();
              }else{
                  $tbl=$isitbl->where('users.nip',$nip)->count();
                  $isitbl=$isitbl->where('users.nip',$nip)->orderBY('activity.date','desc')->get();
              }




          return view('admin.record_activity',[
              'date1'=>$date1,
              'date2'=>$date2,
              //'bulan'=>$bulan,
              'ANbulan'=>$ANbulan,
              'Abulan'=>$Abulan,
              'bbulan'=>$bbulan,
              'isitbl'=>$isitbl,
              'status'=>$status,
              'tbl'=>$tbl,
              'hakakses'=>$hakakses,
              'navhome'=>'',
              'navpresence'=>'',
              'navactivity'=>'btn-light btn',
              'navemployee'=>'']);
          }
      }
}
