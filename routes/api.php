<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register','AuthController@register');
Route::post('/admin-login', 'AuthController@login');
Route::post('/deliveryman-login','AuthController@deliverymanlogin');


Route::middleware('auth:api')->group( function () {
   //category start
 Route::post('/create_category','CategoryController@create');
 Route::get('/category','CategoryController@GetCategory');
 Route::post('/category_edit/{id}','CategoryController@EditCategory');
 Route::delete('/category_Delete/{id}','CategoryController@DeleteCategory');
   //category finished

   //product class start
  Route::post('/productclass_create','ProductController@create');
  Route::get('/productclass_View/{id}','ProductController@getProductclass');
  Route::post('/productclass_edit/{id}','ProductController@EditProductclass');
  Route::delete('/productclass_Delete/{id}','ProductController@DeleteProductclass');
  //product class finished

  //product start
  Route::post('/product_create','ProductController@insert');
  Route::get('/product_View/{id}','ProductController@GetProduct');
  Route::post('/product_edit/{id}','ProductController@EditProduct');
  Route::delete('/product_Delete/{id}','ProductController@DeleteProduct');
  //product finished

  //item category start
  Route::post('/itemcategory_create','ItemcategoryController@create');
  Route::get('/itemcategory_View','ItemcategoryController@GetItemcategory');
  Route::post('/itemcategory_edit/{id}','ItemcategoryController@editItemcategory');
  Route::delete('/itemcategory_Delete/{id}','ItemcategoryController@Deleteitemcategory');
  //itemcategory finished

  // items start---------------
  Route::post('/item_create','ItemController@create');
  Route::get('/item_View/{id}','ItemController@GetItem');
  Route::post('/item_edit/{id}','ItemController@itemviewedit');
  Route::delete('/item_delete/{id}','ItemController@Deleteitem');
  // items finished

  // //product images
  // Route::post('/productimages','Productimages@create');


  //address start
  Route::post('/address_create','AddressController@create');
  Route::get('/address/{id}','AddressController@GetAddress');
  //address finished

  //referral code start
  Route::post('/referral_create','ReferralController@create');
  Route::get('/referral/{id}','ReferralController@GetReferal');
  //referral code finished

  //payment start
  Route::post('/payment_create','PaymentController@create');
  Route::get('/payment/{id}','PaymentController@GetPayment');
  //payment finished

  Route::post('/shipment_create', 'ShipmentController@create');
  Route::get('/shipment/{id}', 'ShipmentController@GetShipment');

// order start
  Route::post('/order_create','OrderController@create');

  Route::get('/pending-order/{id}','OrderController@GetOrder');//delivery-man_id

  Route::get('/complete-order/{id}','OrderController@GetCompleteOrder'); //delivery_man_id

  Route::get('/total-deliveriesAreacash/{delivery_man_id}','OrderController@GetTotalDelivery');

  Route::get('/delivery_date/{id}','OrderController@GetDeliveryDateOrder'); //delivery_date search

 Route::get('/collection/{id}','OrderController@GetDeliveryDateCollection');//delivery_man cash collect




  Route::post('/logout', 'AuthController@logoutApi');



  


  //loop route practise
  // Route::get('/pending_orders/{id}', 'ShipmentController@PendingOrders');
  // Route::get('/total-deliveriesAreacash/{id}', 'ShipmentController@GetTotalDelivery');



});

    Route::get('/testQuery','OrderController@GettestQuery');