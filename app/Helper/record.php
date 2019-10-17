<?php
namespace App\Helper;
use DB;

class record {
    public static function Daily() {
    	 $tgls = date('Y-m-d');
        $table = DB::table('daily')->join('users','daily.nip','=','users.nip')->join('jabatan','users.kd','=','jabatan.kd')->where('daily.date',$tgls);
        return $table;
    }
    public static function Activity(){
    	$tgls = date('Y-m-d');
    	$activity=DB::table('activity')->select('activity.*','users.*','jabatan.*', DB::raw('TIMEDIFF(activity.outtime,activity.intime) AS duration'))->join('users','activity.nip','=','users.nip')->join('jabatan','users.kd','=','jabatan.kd')->where('activity.date',$tgls);
    	return $activity;
    }
    public static function RecordDaily($date1,$date2){
    	
		$recordD=DB::table('daily')->join('users','daily.nip','=','users.nip')->join('jabatan','users.kd','=','jabatan.kd')->whereBetween('daily.date',[$date1,$date2]);
		return $recordD;
    }
public static function RecordActivity($date1,$date2){
        
		$recordA=DB::table('activity')->select('activity.*','users.*','jabatan.*', DB::raw('TIMEDIFF(activity.outtime,activity.intime) AS duration'))->join('users','activity.nip','=','users.nip')->join('jabatan','users.kd','=','jabatan.kd')->whereBetween('activity.date',[$date1,$date2]);
		return $recordA;
    }
}
