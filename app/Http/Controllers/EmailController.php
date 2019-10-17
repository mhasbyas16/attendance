<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DaengwebEmail;

class EmailController extends Controller
{
    public function Registrasi(Request $req){
 		$email = $req->email;
 		$pass 	=str_random(8);
  		$registrasi = $req->nama;
  		Mail::to($email)->send(new DaengwebEmail($registrasi,$pass));
  		return 'Registrasi berhasil';
 	}  
}
