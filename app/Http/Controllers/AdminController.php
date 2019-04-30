<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\users;
use App\jabatan;
use App\Helper\record;

class AdminController extends Controller
{
  public function ViewEdit($id){
    $hakakses = Session::get('hakakses');
    if ($hakakses!="admin") {
      return redirect("edit1/$id");
    }else{
      $view=users::join('jabatan','users.kd','=','jabatan.kd')->where('nip',$id)->first();
      $jabatan=jabatan::all();


      return view('admin.edit_karyawan',[
          'view'=>$view,
          'jabatan'=>$jabatan,
          'hakakses'=>$hakakses,
          'navhome'=>'',
          'navpresence'=>'',
          'navactivity'=>'',
          'navemployee'=>'btn-light btn']);
      }
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

  public function HomeA(){
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

          if ($hakakses=='admin' OR $hakakses=='super user') {
              $jmltable=$table->count();
              $table=$table->orderBy('intime', 'ASC')->get();
              $jmlAtable=$Atable->count();
              $Atable=$Atable->orderBy('intime', 'ASC')->get();

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
          }else{
            return redirect("/homeK");

          }
          }

      }

      public function Record(){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','Please, Login First');
          }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          $date1=date('Y-m').'-01';
          $date2=date('Y-m').'-31';
          include "bulan.php";
          $isitbl=record::RecordDaily($date1,$date2);
          include 'pesan.php';

          if ($hakakses=='admin' OR $hakakses=='super user') {
                  $tbl=$isitbl->count();
                  $isitbl=$isitbl->orderBY('daily.date','DESC')->orderBY('daily.intime','ASC')->get();

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
              }else{
                return redirect("/recordK");
              }
          }
      }


      public function Export($date1,$date2,$ex){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','Please, Login First');
          }else{
          include "bulan.php";
          $isitbl=record::RecordDaily($date1,$date2)->orderBY('daily.date','asc')->orderBY('daily.intime','asc')->get();
           $sum=DB::table('daily')->select('users.nama','daily.nip',DB::raw('count(*)as total'))->join('users','daily.nip','=','users.nip')->whereBetween('daily.date',[$date1,$date2])->groupBy('daily.nip','users.nama')->get();

            if ($ex=='excel') {
             $export="<script type='text/javascript'>exportTabelKeCSV('Record_Attendance_".$date1."_".$date2.".csv')</script>";
             $exportN=header('Refresh: 0; URL='.url('/record').'');
          }elseif ($ex=='pdf') {
              $export="<script>window.print()</script>";
              $exportN=header('Refresh: 0; URL='.url('/record').'');
          }

          return view('admin.report_record',[
              'export'=>$export,
              'exportN'=>$exportN,
              'date1'=>$date1,
              'date2'=>$date2,
              'ANbulan'=>$ANbulan,
              'Abulan'=>$Abulan,
              'bbulan'=>$bbulan,
              'isitbl'=>$isitbl,
              'sum'=>$sum]);
          }
      }

      public function ViewAdd(){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','login terlebih dahulu');
          }else{
              $nip = Session::get('nip');
              $hakakses = Session::get('hakakses');
              $jabatan=jabatan::all();

               if ($hakakses=='admin') {
                  $rules='';
              }else{
                  $rules='disabled';
              }
              include 'pesan.php';

              return view('admin.add_employee',[
              'jabatan'=>$jabatan,
              'rules'=>$rules,
              'hakakses'=>$hakakses,
              'status'=>$status,
              'navhome'=>'',
              'navpresence'=>'',
              'navactivity'=>'',
              'navemployee'=>'btn-light btn']);
          }
      }

      public function AddNew(Request $req){
  			if (!Session::get('login')) {
  					return redirect('/')->with('alert','login terlebih dahulu');
  			}else{
  			$nip = Session::get('nip');
  			$hakakses = Session::get('hakakses');
          $nip=$req->nip;
          $nama=$req->nama;
          $gender=$req->gender;
          $email=$req->email;
          $jabatan=$req->jabatan;
          $password=md5($req->password);
          $password2=md5($req->password2);
          $hakakses='karyawan';

          if ($password==$password2) {
              $save=['nip'=>$nip,'nama'=>$nama,'gender'=>$gender,'email'=>$email,'kd'=>$jabatan,'password'=>$password,'hakakses'=>$hakakses];

          users::insert($save);
          return redirect('/addemployee')->with('success_alert','! Success Add New Data');
          }else{
              return redirect('/addemployee')->with('alert','! Password Not Same Repeat Again');
          }
  			}
      }

      public function DeleteData($nip){

              users::where('nip',$nip)->delete();

              return redirect('/viewemployee')->with('success_alert','! Data Has Been Deleted');
      }


      public function ViewActivity(){
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
                  $isitbl=$isitbl->orderBY('activity.date','desc')->orderBY('activity.intime','ASC')->get();

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
              }else{
                  return redirect("/recordactivityK");
              }
          }
      }


      public function ExportActivity($date1,$date2,$ex){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','login terlebih dahulu');
          }else{
          include "bulan.php";
          $isitbl=record::RecordActivity($date1,$date2)->orderBy('activity.date','asc')->orderBy('activity.intime','asc')->get();

          if ($ex=='excel') {
             $export="<script type='text/javascript'>exportTabelKeCSV('Record_Activity_".$date1."_".$date2.".csv')</script>";
             $exportN=header('Refresh: 0; URL='.url('/recordactivity').'');
          }elseif ($ex=='pdf') {
              $export="<script>window.print()</script>";
              $exportN=header('Refresh: 0; URL='.url('/recordactivity').'');
          }


          $sum=DB::table('activity')->select('users.nama','activity.nip',DB::raw('count(*)as total'))->join('users','activity.nip','=','users.nip')->whereBetween('activity.date',[$date1,$date2])->groupBy('activity.nip','users.nama')->get();
          return view('admin.report_activity',[
              'export'=>$export,
              'exportN'=>$exportN,
              'date1'=>$date1,
              'date2'=>$date2,
              'ANbulan'=>$ANbulan,
              'Abulan'=>$Abulan,
              'bbulan'=>$bbulan,
              'isitbl'=>$isitbl,
              'sum'=>$sum]);
          }
      }

      public function pesan(){
          if (!Session::get('login')) {
              return redirect('/')->with('alert','Please, login first');
          }else{
          $nip = Session::get('nip');
          $hakakses = Session::get('hakakses');
          $service=DB::table('service')->where('status','');
          $service=$service->get();

          return view('admin.isi_pesan',[
              'service'=>$service,
              'hakakses'=>$hakakses,
              'navhome'=>'',
              'navpresence'=>'',
              'navactivity'=>'',
              'navemployee'=>'']);
          }
      }

      public function Mark($status,$id){
          $simpan=['status'=>$status];
          DB::table('service')->where('id',$id)->update($simpan);
          return redirect ('/helpdesks');

      }

}
