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
              'navemployee'=>'',
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
              'T12'=>$T12]);
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
