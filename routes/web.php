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
// route to login and logout


     Route::get('/', 'homecontroller@index')->name('index');
     Route::get('/contact-us', 'homecontroller@contact_us')->name('contact-us');
     Route::get('/about-us', 'homecontroller@about_us')->name('about-us');
     Route::get('/events', 'homecontroller@events')->name('events');
     Route::get('/faq', 'homecontroller@faq')->name('faq');
     Route::get('/career', 'homecontroller@career')->name('career');
     Route::get('/description', 'homecontroller@description')->name('description');
     Route::get('/light-beer', 'homecontroller@light_beer')->name('light-beer');
     Route::get('/strong-beer', 'homecontroller@strong_beer')->name('strong-beer');
     Route::get('/extra-strong-beer', 'homecontroller@extra_strong_beer')->name('extra-strong-beer');
     Route::get('/DMCA-and-policy', 'homecontroller@DMCA')->name('DMCA');
     Route::get('/thank_you', 'homecontroller@thank_you')->name('thank_you');
     Route::post('/enquiry', 'HomeController@enquiry')->name('enquiry');
     Route::post('/dmca_submit', 'HomeController@dmca_submit')->name('dmca_submit');
     Route::post('/career_enquiry', 'HomeController@career_enquiry')->name('career_enquiry');
     Route::POST('/otpcheck','HomeController@otpcheck')->name('otpcheck');
     Route::POST('/forgotpassword','HomeController@forgotpassword')->name('forgotpassword');
     Route::POST('/forgotpasswordchange','HomeController@forgotpasswordchange')->name('forgotpasswordchange');

     Route::prefix('/admin')->group(function() {
       Route::get('/', 'Auth\AdminLoginController@showLoginForm');
       Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin-form');
       Route::post('login', 'Auth\AdminLoginController@attemptlogin')->name('admin-login');
       Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin-logout');

       Route::get('/dashboard', 'admincontroller@index')->name('admin-dashboard');

       Route::get('/profile', 'admincontroller@profile')->name('admin-profile');
       Route::POST('/edit_profile_submit', 'admincontroller@edit_profile_submit')->name('admin-edit_profile_submit');

       Route::get('/product', 'admincontroller@product')->name('admin-product');
       Route::get('/product_details', 'admincontroller@product_details')->name('admin-product_details');
       Route::get('/product_details_load', 'admincontroller@product_details_load')->name('admin-product_details_load');
       Route::get('/add_product', 'admincontroller@add_product')->name('admin-add_product');
       Route::POST('/add_product_submit', 'admincontroller@add_product_submit')->name('admin-add_product_submit');
       Route::get('/edit_product', 'admincontroller@edit_product')->name('admin-edit_product');
       Route::POST('/edit_product_submit', 'admincontroller@edit_product_submit')->name('admin-edit_product_submit');
       Route::get('/delete_product', 'admincontroller@delete_product')->name('admin-delete_product');
       
       Route::get('/distributer', 'admincontroller@distributer')->name('admin-distributer');
       Route::get('/distributer_details', 'admincontroller@distributer_details')->name('admin-distributer_details');
       Route::get('/distributer_details_load', 'admincontroller@distributer_details_load')->name('admin-distributer_details_load');
       Route::get('/add_distributer', 'admincontroller@add_distributer')->name('admin-add_distributer');
       Route::POST('/add_distributer_submit', 'admincontroller@add_distributer_submit')->name('admin-add_distributer_submit');
       Route::get('/edit_distributer', 'admincontroller@edit_distributer')->name('admin-edit_distributer');
       Route::POST('/edit_distributer_submit', 'admincontroller@edit_distributer_submit')->name('admin-edit_distributer_submit');
       Route::get('/delete_distributer', 'admincontroller@delete_distributer')->name('admin-delete_distributer');
       
       Route::get('/batch', 'admincontroller@lot')->name('admin-lot');
       Route::get('/batch_details', 'admincontroller@lot_details')->name('admin-lot_details');
       Route::get('/batch_details_load', 'admincontroller@lot_details_load')->name('admin-lot_details_load');
       Route::get('/add_batch', 'admincontroller@add_lot')->name('admin-add_lot');
       Route::POST('/add_batch_submit', 'admincontroller@add_lot_submit')->name('admin-add_lot_submit');
       Route::get('/edit_batch', 'admincontroller@edit_lot')->name('admin-edit_lot');
       Route::POST('/edit_batch_submit', 'admincontroller@edit_lot_submit')->name('admin-edit_lot_submit');
       Route::get('/delete_batch', 'admincontroller@delete_lot')->name('admin-delete_lot');
       
       Route::get('/order', 'admincontroller@order')->name('admin-order');
       Route::get('/order_invoice', 'admincontroller@order_invoice')->name('admin-order_invoice');
       Route::get('/get_batch', 'admincontroller@get_lot')->name('admin-get_lot');
       Route::get('/order_details', 'admincontroller@order_details')->name('admin-order_details');
       Route::get('/add_order', 'admincontroller@add_order')->name('admin-add_order');
       Route::POST('/add_order_submit', 'admincontroller@add_order_submit')->name('admin-add_order_submit');
       Route::get('/edit_order', 'admincontroller@edit_order')->name('admin-edit_order');
       Route::POST('/edit_order_submit', 'admincontroller@edit_order_submit')->name('admin-edit_order_submit');
       Route::get('/delete_order', 'admincontroller@delete_order')->name('admin-delete_order');

       Route::get('/enquiry', 'admincontroller@enquiry')->name('admin-enquiry');
       Route::get('/edit_enquiry', 'admincontroller@edit_enquiry')->name('admin-edit_enquiry');
       Route::get('/delete_enquiry', 'admincontroller@delete_enquiry')->name('admin-delete_enquiry');

       Route::get('/change_password', 'admincontroller@change_password')->name('admin-change_password');
       Route::POST('/change_password_submit', 'admincontroller@change_password_submit')->name('admin-change_password_submit');

       Route::get('/profile', 'admincontroller@profile')->name('admin-profile');
       Route::POST('/edit_profile_submit', 'admincontroller@edit_profile_submit')->name('admin-edit_profile_submit');

       
       Route::get('/balance_sheet', 'admincontroller@balance_sheet')->name('admin-balance_sheet');
       Route::get('/balance_sheet_load', 'admincontroller@balance_sheet_load')->name('admin-balance_sheet_load');
       Route::get('/export_balance_sheet', 'admincontroller@export_balance_sheet')->name('admin-export_balance_sheet');
       Route::get('/export_product_details', 'admincontroller@export_product_details')->name('admin-export_product_details');
       Route::get('/export_distributer_details', 'admincontroller@export_distributer_details')->name('admin-export_distributer_details');
       Route::get('/export_batch_details', 'admincontroller@export_lot_details')->name('admin-export_lot_details');
     });

     
