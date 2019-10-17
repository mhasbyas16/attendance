<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Redirect;

class PresenceController extends Controller
{
	public function Index(){
		if (Session::has('login')) {
			return redirect('/admin');
		}else{
			return view('index');
			 // return Redirect::to('https://www.attrack.ib-synergy.co.id/index');
		}
	}

/*	public function Indexs(){
		if (Session::has('login')) {
			return redirect('/admin');
		}else{
			return view('index');
		}
	}*/
    public function helped (){
        if (!Session::get('login')) {
            return redirect('/')->with('alert','login terlebih dahulu');
        }else{
        $isiP=service::where('status','')->get();
        include 'pesan.php';
        return view('admin.isi_pesan',['isiP'=>$isiP,'status'=>$status]);
    }
    }

}
