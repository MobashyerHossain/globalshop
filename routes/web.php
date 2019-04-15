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

//Index Route
Route::get('/', 'Auth\ConsumerControllers\ConsumerController@index')->name('index');
Route::post('/', 'Auth\LoginController@login')->name('login.submit');

//Resource Routes
Route::resource('images', 'ModelControllers\ImageController');
Route::resource('myfavourites', 'ModelControllers\MyFavouriteController');
Route::resource('carts', 'ModelControllers\CartController');
Route::resource('cars', 'ModelControllers\CarController');
Route::resource('carMakers', 'ModelControllers\CarMakerController');
Route::resource('carModels', 'ModelControllers\CarModelController');
Route::resource('parts', 'ModelControllers\PartController');
Route::resource('partCategories', 'ModelControllers\PartCategoryController');
Route::resource('partSubCategories', 'ModelControllers\PartSubCategoryController');
Route::resource('partManufacturers', 'ModelControllers\PartManufacturerController');
Route::resource('roles', 'ModelControllers\RoleController');
Route::resource('staffCruds', 'ModelControllers\StaffCrudController')->middleware('auth:showroomstaff');
Route::resource('adminCruds', 'ModelControllers\AdminCrudController')->middleware('auth:admin');
Route::resource('showrooms', 'ModelControllers\ShowRoomController')->middleware('auth:admin');

//Consumer Routes
Route::prefix('consumer')->group(function(){
  Route::get('/home', 'Auth\ConsumerControllers\ConsumerController@index')->name('consumer.home');
  Route::get('/profile', 'Auth\ConsumerControllers\ConsumerController@profile')->name('consumer.profile');
  Route::post('/profile/update/{id}', 'Auth\ConsumerControllers\ConsumerController@update')->name('consumer.profile.edit');

  //Auth Routes
    //login
  Route::get('/', 'Auth\ConsumerControllers\ConsumerLoginController@show')->name('consumer.login');
  Route::post('/', 'Auth\ConsumerControllers\ConsumerLoginController@login')->name('consumer.login.submit');
  Route::get('/logout', 'Auth\ConsumerControllers\ConsumerLoginController@consumerLogout')->name('consumer.logout');
    //register
  Route::get('/register', 'Auth\ConsumerControllers\ConsumerRegisterController@show')->name('consumer.register');
  Route::post('/register', 'Auth\ConsumerControllers\ConsumerRegisterController@register')->name('consumer.register.submit');
    //password reset
  Route::post('/password/email', 'Auth\ConsumerControllers\ConsumerForgotPasswordController@sendResetLinkEmail')->name('consumer.password.email');
  Route::get('/password/reset', 'Auth\ConsumerControllers\ConsumerForgotPasswordController@showLinkRequestForm')->name('consumer.password.request');
  Route::post('/password/reset', 'Auth\ConsumerControllers\ConsumerResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\ConsumerControllers\ConsumerResetPasswordController@showResetForm')->name('consumer.password.reset');
    //verification
  Route::get('/verification/{id}', 'Auth\ConsumerControllers\ConsumerController@verifyAccount')->name('consumer.verify');
});

//Admin Routes
Route::prefix('admin')->group(function(){
  Route::get('/dashboard', 'Auth\AdminControllers\AdminController@index')->name('admin.dashboard')->middleware('auth:admin');
  Route::get('/profile', 'Auth\AdminControllers\AdminController@profile')->name('admin.profile')->middleware('auth:admin');
  Route::post('/profile/update/{id}', 'Auth\AdminControllers\AdminController@update')->name('admin.profile.edit');

  //Auth Routes
    //login
  Route::get('/', 'Auth\AdminControllers\AdminLoginController@show')->name('admin.login');
  Route::post('/', 'Auth\AdminControllers\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Auth\AdminControllers\AdminLoginController@adminLogout')->name('admin.logout');
    //password reset
  Route::post('/password/email', 'Auth\AdminControllers\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email')->middleware('auth:admin');
  Route::get('/password/reset', 'Auth\AdminControllers\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request')->middleware('auth:admin');
  Route::post('/password/reset', 'Auth\AdminControllers\AdminResetPasswordController@reset')->middleware('auth:admin');
  Route::get('/password/reset/{token}', 'Auth\AdminControllers\AdminResetPasswordController@showResetForm')->name('admin.password.reset')->middleware('auth:admin');
    //verification
  Route::get('/verify', 'Auth\AdminControllers\AdminController@verifyAccount')->name('admin.verify')->middleware('auth:admin');

  //views

});

//Show Room Routes
Route::prefix('showroomstaff')->group(function(){
  Route::get('/dashboard', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@index')->name('showroom.show.dashboard')->middleware('auth:showroomstaff');
  Route::get('/profile', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@showProfile')->name('showroom.show.profile')->middleware('auth:showroomstaff');
  Route::post('/profile/update/{id}', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@updateProfile')->name('showroom.update.profile');
  Route::get('/addproduct', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@addProduct')->name('showroom.add.product')->middleware('auth:showroomstaff');
  Route::get('/updatePart/{type}/{id}', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@updateProduct')->name('showroom.update.part')->middleware('auth:showroomstaff');
  Route::get('/updateCar/{type}/{id}', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@updateProduct')->name('showroom.update.car')->middleware('auth:showroomstaff');
  Route::get('/inventory', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@showInventory')->name('showroom.show.inventory')->middleware('auth:showroomstaff');

  //Auth Routes
    //login
  Route::get('/', 'Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController@show')->name('showroomstaff.login');
  Route::post('/', 'Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController@login')->name('showroomstaff.login.submit');
  Route::get('/logout', 'Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController@showroomstaffLogout')->name('showroomstaff.logout');
    //password reset
  Route::post('/password/email', 'Auth\ShowRoomStaffControllers\ShowRoomStaffForgotPasswordController@sendResetLinkEmail')->name('showroomstaff.password.email')->middleware('auth:showroomstaff');
  Route::get('/password/reset', 'Auth\ShowRoomStaffControllers\ShowRoomStaffForgotPasswordController@showLinkRequestForm')->name('showroomstaff.password.request')->middleware('auth:showroomstaff');
  Route::post('/password/reset', 'Auth\ShowRoomStaffControllers\ShowRoomStaffResetPasswordController@reset')->middleware('auth:showroomstaff');
  Route::get('/password/reset/{token}', 'Auth\ShowRoomStaffControllers\ShowRoomStaffResetPasswordController@showResetForm')->name('showroomstaff.password.reset')->middleware('auth:showroomstaff');
    //verification
  Route::get('/verify', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@verifyAccount')->name('showroomstaff.verify');
});

//Oauth Route
Route::get('socialauth/{provider}', 'Auth\OauthController@redirectToProvider')->name('socialauth.redirect');
Route::get('socialauth/{provider}/callback', 'Auth\OauthController@handleProviderCallback')->name('socialauth.callback');

//Product Route
Route::prefix('product_details')->group(function(){
  //Car By Maker
  Route::get('car/maker/{carMakerId}', 'OtherControllers\ProductController@findMaker')->name('find.car.maker');
  Route::get('carmaker/{carMakerName}', 'OtherControllers\ProductController@showMaker')->name('show.car.maker');

  //Car By Model
  Route::get('car/model/{modelId}', 'OtherControllers\ProductController@findModel')->name('find.car.model');
  Route::get('car/{carMakerName}/{modelName}', 'OtherControllers\ProductController@showModel')->name('show.car.model');

  //Part By Category
  Route::get('part/category/{partCategoryId}', 'OtherControllers\ProductController@findByCategory')->name('find.part.category');
  Route::get('partcategory/{partCategoryName}', 'OtherControllers\ProductController@showByCategory')->name('show.part.category');

  //Part By Sub Category
  Route::get('part/subCategory/{subCategoryId}', 'OtherControllers\ProductController@findSubCategory')->name('find.part.subCategory');
  Route::get('part/{partCategoryName}/{subCategoryName}', 'OtherControllers\ProductController@showSubCategory')->name('show.part.subCategory');

  //Part By Manufacturer
  Route::get('part_Manufacturer/{partManufacturerId}', 'OtherControllers\ProductController@findByManufacturer')->name('find.part.manufacturer');
  Route::get('partmanufacturer/{partManufacturerName}', 'OtherControllers\ProductController@showByManufacturer')->name('show.part.manufacturer');

  //Car Details
  Route::get('car/{carId}', 'OtherControllers\ProductController@findCar')->name('find.car.details');
  Route::get('car/{carMakerName}/{carModelName}/{carName}', 'OtherControllers\ProductController@showCar')->name('show.car.details');

  //Part Details
  Route::get('part/{partId}', 'OtherControllers\ProductController@findPart')->name('find.part.details');
  Route::get('part/{partCategoryName}/{partSubCategoryName}/{partManufacturerName}/{partName}', 'OtherControllers\ProductController@showPart')->name('show.part.details');

});

//Part Payment
Route::prefix('payment')->group(function(){
  Route::Post('checkout', 'OtherControllers\ProductController@checkOut')->name('part.payment');
});

//Car Handling Route
Route::prefix('carHandling')->group(function(){
  Route::get('{form_type}/{car_id}', 'OtherControllers\CarHandlingController@findForm')->name('find.carHandling.form');
  Route::get('{form_type}/{car_maker}/{car_model}/{car_name}', 'OtherControllers\CarHandlingController@showForm')->name('show.carHandling.form');

  //carbooking
  Route::post('carBooking', 'OtherControllers\CarHandlingController@bookCar')->name('car.booking');

  //cartestdriving
  Route::post('carTestDriving', 'OtherControllers\CarHandlingController@testDriveCar')->name('car.testDriving');

  //cartestdriving
  Route::post('applyForCarLoan', 'OtherControllers\CarHandlingController@applyForCarLoan')->name('car.loan.apply');
});

//Customized Routes
  //Cart
  Route::delete('cart/deleteAll/{consumer_Id}', 'ModelControllers\CartController@deleteAllfromCart')->name('cart.delete.all');
  Route::get('myOrder', 'ModelControllers\CartController@showMyOrders')->name('cart.myOrders');
  //MyFavourite
  Route::delete('deleteFavourite/{id}', 'ModelControllers\MyFavouriteController@destroyFromProfile')->name('delete.favourite.from.profile');
  //Image
  Route::post('profilePic', 'ModelControllers\ImageController@storeProfilePicture')->name('profilepic.upload');
