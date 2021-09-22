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



Auth::routes();
Route::get('/','pagesController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/auth2','adminController@index')->name('Admin');
Auth::routes();
Route::resource('category','categoryController');
Route::resource('movie','movieController');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/addCategory','ajaxController@addCategory');
Route::post('/addTicket','ajaxController@addTicket');
Route::post('/cartUpdate','ajaxController@cartUpdate');
Route::resource('/ticket','ticketController');
Route::resource('cart','cartController');
Route::post('/cartDestroy','ajaxController@cartDestroy');
Route::get('/checkout','checkoutController@checkout')->name('checkout');
Route::resource('client_info','client_infoController');
Route::resource('payment','paymentController');
Route::get('userActivity','pagesController@userActivity')->name('userActivity');
Route::get('/ticket_all','adminController@ticket_all')->name('All Tickets Booked');
Route::get('/ticket_today','adminController@ticket_today')->name(' Tickets Booked Today');
//Route::get('/qrcode','adminController@qrcode')->name(' QRcode Scanner');
Route::get('/alltickets','adminController@allticket')->name('all tickets');
//Route::get('/qrcode/{{id}}','pagesController@qrcode($id)');
Route::get('qrcode/{id}', function ($id) {
    $booked = App\booked_ticket::find($id);
    return view('user.qrcode')->with('booked',$booked);

});
Route::post('/changeStatus','ajaxController@changeStatus')->name('changeStatus');
Route::get('/today','pagesController@today')->name('SHOWING TODAY');
Route::get('/qrcode','adminController@qrcode');