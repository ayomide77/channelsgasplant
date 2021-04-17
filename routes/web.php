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

//GENERALLY ACCESSIBLE ROUTES

    Route::get('/','GeneralController@index')->name('index');
    Route::get('about', 'GeneralController@about')->name('about');

    // <------- CONTACT US ROUTES --------->
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::post('contact', 'ContactController@send')->name('contact.send');
    // <------- CONTACT US ROUTES --------->

    Route::get('products','GeneralController@products')->name('products');
    Route::get('product/{id}','GeneralController@show')->name('product');


    // <------- TESTIMOMIAL ROUTES   --------->
    Route::get('testimonial','TestimonialController@index')->name('testimonial');
    Route::post('testimonial','TestimonialController@store')->name('testimonial');
    // <------- TESTIMOMIAL ROUTES --------->

    

    // <------------ ADMIN LOGIN ROUTE ------------->
    Route::get('admin/auth','Admin\AuthController@login')->name('adminLogin');
    // <------------ ADMIN LOGIN ROUTE ------------->



    Route::get('/test-email', function () {
        return view('emails.SendContactusEmail');
    });


// CUSTOMER CART ROUTE
Route::group(['prefix' => 'cart'], function () {
    
    Route::get('/', 'ProductCartController@index')->name('cart');
    Route::post('create', 'ProductCartController@create')->name('cart.create');
    Route::get('checkout', 'ProductCartController@cartCheckout')->name('cart.cartCheckout');
    Route::post('order', 'ProductCartController@completeOrder')->name('order');
    Route::delete('remove/{cartid}', 'ProductCartController@removeCart');
    Route::patch('update/{cartid}', 'ProductCartController@update');
    Route::delete('destroy', 'ProductCartController@destroy')->name('cart.destroy');
});


 //AUTH ROUTES
Auth::routes();


// GROUP ROUTES FOR CUSTOMER
Route::group(['prefix'=>'home','middleware' => ['auth']], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@profile')->name('profilePage');
    Route::patch('profile/{id}', 'HomeController@updateProfile')->name('updateprofile');
    Route::get('profile/setting', 'HomeController@setting')->name('setting');
    Route::patch('profile/setting/{id}', 'HomeController@postSetting')->name('postsetting');
    Route::get('create-ticket', 'HomeController@createTicket')->name('createTicket');
    Route::get('orders', 'OrderControllerController@index')->name('customerOrders');
    Route::resource('ticket','TicketController',['except'=>['destory','create','show']]);
});


    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','role:Admin|Sales'])->group(function(){
    Route::get('home', 'HomeController@index')->name('dashboard');
    Route::get('orders','OrderControllerController@listOrders')->name('orders');
    Route::get('sales','OrderControllerController@sales')->name('sales');
    Route::post('confirm-order','OrderControllerController@update')->name('confirm.order');
    Route::get('pending-orders','OrderControllerController@pendingOrders')->name('pendingorders');
    Route::get('completed-orders','OrderControllerController@completedOrders')->name('completedorders');
    Route::get('invoice/{order_no}','OrderControllerController@generateInvoice')->name('generateinvoice');
    Route::get('reciept/{order_no}','OrderControllerController@generateReceipt')->name('generatereciept');
    Route::get('archived-product','ProductController@archived')->name('archivedproducts');
    // <--------- REPORT ROUTE ---------------->
    Route::get('report','ReportController@index')->name('reportindex');
    Route::post('report/product','ReportController@productReports')->name('productreports');
    Route::post('report/sales','ReportController@salesReport')->name('salesreport');
    // <--------- REPORT ROUTE ---------------->

    Route::patch('password/{id}','UserController@resetUserpassword')->name('resetPassword');

    //<-------------- TICKET ------------------>
    Route::get('ticket/attended','AdminTicketController@attended')->name('attended');

    Route::resource('ticket','AdminTicketController');
    //<-------------- TICKET ------------------>


    //<-------- SEND RECEIPT ------------------>
    // Route::post('report/send','ReportController@salesReport')->name('sendreceipt');


    // <-------- EMAIL CONTROLLER ------->
    Route::get('email/receipt/{id}/{userid}','EmailController@sendReceipt')->name('sendreceipt');
    // <-------- EMAIL CONTROLLER ------->

    Route::resource('profile','ProfileController');
    Route::resource('products','ProductController');
    Route::resource('products','ProductController');
    Route::resource('roles','RoleController');
    Route::resource('staff','StaffController');
    Route::resource('users','UserController');
    Route::resource('testimonial','TestimonialController');
});
