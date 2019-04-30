<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login
Route::post('/login','LoginController@Login');//validasi login
Route::get('/admin','LoginController@BerhasilLogin');//hasil login
Route::get('/logout','LoginController@Logout');//logout
Route::get('/web','LoginController@web');

//Users
Route::post('/checkin','UsersController@CIn');// checkin dan checkout
Route::post('/activityin','UsersController@AIn');// checkin dan checkout
Route::post('/addcust','UsersController@Addcust');
Route::get('/edit1/{id}','UsersController@ViewEdit');//tampil form edit
Route::get('/viewemployee','UsersController@ViewEmp');//menampilkan data karyawan
Route::post('/searchactivity','UsersController@SearchActivity');//search di activity
Route::post('/search','UsersController@ViewRecord');//hasil filter record_presence
Route::post('/forgot','UsersController@forgotpassword');
Route::get('/reset/{nm}/{email}/{sub}','UsersController@resetpassword');



//ADMIN
Route::get('/edit/{id}','AdminController@ViewEdit');//tampil form edit
Route::post('/saveedit','AdminController@SaveEdit');//save edit
Route::get('/homeA','AdminController@HomeA');//
Route::get('/record','AdminController@Record');//tampilan home admin
Route::get('/export/{date1}/{date2}/{ex}','AdminController@Export');//export record presence
Route::get('/addemployee','AdminController@ViewAdd');//tampil tambah data
Route::post('/addnew','AdminController@AddNew');//tambah data karyawan baru
Route::get('/deletedata/{nip}','AdminController@DeleteData');//delete data karyawan
Route::get('/recordactivity','AdminController@ViewActivity');//melihat rocord activity
Route::get('/exportactivity/{date1}/{date2}/{ex}','AdminController@ExportActivity');//export activity
Route::get('/helpdesks','AdminController@pesan');//menuju isi pesan helpdesk
Route::get('/mark/{status}/{id}','AdminController@Mark');//tanda pesan sudah dibaca

//KARYAWAN
Route::get('/homeK','KaryawanController@HomeK');//
Route::get('/recordK','KaryawanController@RecordK');//tampilan home admin
Route::get('/recordactivityK','KaryawanController@ViewActivityK');//melihat rocord activity


//Presence

Route::get('/','PresenceController@Index');//balik ke home
Route::get('/index','PresenceController@Indexs');//balik ke home
