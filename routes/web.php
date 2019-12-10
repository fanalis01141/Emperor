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

use App\Customer;
use App\RoomType;
use App\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('settings', 'SettingController');
    Route::resource('roomType', 'RoomTypeController');
    Route::resource('assist', 'AssistantController');
    Route::resource('room', 'RoomController');
    Route::resource('customer', 'CustomerController');
    Route::resource('admin', 'AdminController');
    
    Route::get('success-customer', 'CustomerController@showSuccess')->name('customer.success');
    
    
    Route::post('edit-room/new-room', 'RoomController@editRoom')->name('room.editRoom');
    Route::post('delete/room', 'RoomController@deleteRoom')->name('room.deleteRoom');
    Route::post('edit-roomType/new-roomType', 'RoomTypeController@editRoomType')->name('roomType.editRoomType');
    Route::post('edit-assist/new-assist', 'AssistantController@editAssist')->name('room.editAssist');
    Route::post('edit-customer/new-edit', 'CustomerController@edits')->name('customer.edits');
    Route::post('customer/check-out', 'CustomerController@checkout')->name('customer.checkout');
    
    
    
    
    Route::get('/new-customer', 'HomeController@addCustomer')->name('addCustomer');
    Route::get('/admin-panel', 'AdminController@showPanel')->name('showPanel');
    Route::post('/save-gross', 'AdminController@saveGross')->name('admin.saveGross');

    
    
    
    Route::get('/ajax-amount',function(){
        $id = Input::get('id');
        $amount = RoomType::where('id', $id)->get();
        return Response::json($amount);
    });
    
    Route::get('/ajax-amount-edit',function(){
        $id = Input::get('id');
        $amount = RoomType::where('id', $id)->get();
    
        return Response::json($amount);
    });
    
    Route::get('/ajax-room',function(){
        $id = Input::get('id');
        $amount = Room::where('id', $id)->get();
    
        return Response::json($amount);
    });
    
    Route::get('/save-new-customer',function(){
        $id = Input::get('id');
        $amount = RoomType::where('id', $id)->get();
    
        return Response::json($amount);
    });
    
    
    Route::get('/get-time-out',function(){
        $id = Input::get('id');
        $cust = Customer::where('id', $id)->get();
    
        return Response::json($cust);
    });
    
    Route::get('/get-card-time',function(){
    
        $room = Input::get('room');
        $time = Customer::where('room', $room)->where('status','IN')->get();
        $rooms = Room::where('room_num',$room)->get();
        
    
        return Response::json(array('time'=>$time,
                                    'rooms'=>$rooms));
    });

    Route::get('search',function(){
        $date = Input::get('date');
        $records = Customer::whereDate('created_at',$date)->get();
        return Response::json($records);

    });
});
