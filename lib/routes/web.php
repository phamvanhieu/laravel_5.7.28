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

// =================================== USER ===================================
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@getHome');
    Route::get('home', 'HomeController@getHome');
    Route::get('detail/{id}/{name?}', 'DetailController@getDetail');
    Route::post('detail/{id}/{name?}', 'DetailController@postDetail');
    Route::get('category/{cate_id}/{manu_id?}', 'HomeController@getCategory');
    Route::get('manufacture/{manu_id}', 'HomeController@getManufacture');
    Route::get('search', 'HomeController@search'); 
    Route::group(['prefix' => 'cart'], function () {
        Route::get('add/{id}', 'CartController@getAddCart');
        Route::get('show', 'CartController@getShowCart');
        Route::get('delete/{rowId}', 'CartController@getDeleteCart');
        Route::get('update/{rowId}', 'CartController@getUpdateCart');
    });
    Route::get('order', 'HomeController@getOrder'); 
    Route::get('complete', 'HomeController@getComplete'); 
    Route::get('contact', 'HomeController@getContact');    
    Route::post('contact', 'HomeController@postContact');
    Route::get('account', 'HomeController@getAccount');
    Route::post('account', 'HomeController@postAccount');

    Route::get('message', 'HomeController@getMessage');
    Route::get('bill', 'HomeController@geBill');
    Route::get('viewdetailbill/{id}', 'HomeController@geViewDetailBill');
});
// ================================= END USER =================================



// =================================== LOGIN ===================================
Route::get('register','LoginController@getRegister');
Route::post('register','LoginController@postRegister');
Route::group(['prefix' => 'login','middleware'=>'CheckLogedIn'], function () {
    Route::get('/','LoginController@getLogin');
    Route::post('/','LoginController@postLogin');
});
Route::get('logout', 'LoginController@getLogout');
// ================================= END LOGIN =================================



// =================================== ADMIN ===================================
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin','middleware'=>'CheckLogedOut'], function () {        
        Route::get('home', 'HomeController@getHome');
        Route::group(['prefix' => 'category'], function () {
            Route::get('show', 'CategoryController@getCateShow');
            Route::post('show', 'CategoryController@postCateShow');
            Route::get('edit/{id}', 'CategoryController@getCateEdit');
            Route::post('edit/{id}', 'CategoryController@postCateEdit');
            Route::get('delete/{id}', 'CategoryController@getCateDelete');
        });
        Route::group(['prefix' => 'manufacture'], function () {
            Route::get('show', 'ManufactureController@getManuShow');
            Route::post('show', 'ManufactureController@postManuShow');
            Route::get('edit/{id}', 'ManufactureController@getManuEdit');
            Route::post('edit/{id}', 'ManufactureController@postManuEdit');
            Route::get('delete/{id}', 'ManufactureController@getManuDelete');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('show', 'ProductController@getProductShow');
            Route::get('add', 'ProductController@getProductAdd');
            Route::post('add', 'ProductController@postProductAdd');
            Route::get('delete/{id}', 'ProductController@getProductDelete');
            Route::get('edit/{id}', 'ProductController@getProductEdit');
            Route::post('edit/{id}', 'ProductController@postProductEdit');
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('show', 'UserController@getUserShow');
            Route::get('add', 'UserController@getUserAdd');
            Route::post('add', 'UserController@postUserAdd');
            Route::get('delete/{id}', 'UserController@getUserDelete');
            Route::get('edit/{id}', 'UserController@getUserEdit');
            Route::post('edit/{id}', 'UserController@postUserEdit');
        });
        Route::group(['prefix' => 'config'], function () {
            Route::get('logo', 'ConfigController@getLogoEdit');
            Route::post('logo', 'ConfigController@postLogoEdit');
            Route::get('namesite', 'ConfigController@getNamesiteEdit');
            Route::post('namesite', 'ConfigController@postNamesiteEdit');
            Route::get('phonesite', 'ConfigController@getPhonesiteEdit');
            Route::post('phonesite', 'ConfigController@postPhonesiteEdit');
            Route::get('addresssite', 'ConfigController@getAddresssiteEdit');
            Route::post('addresssite', 'ConfigController@postAddresssiteEdit');
        });
        Route::group(['prefix' => 'customer/'], function () {
            Route::get('show', 'customerController@getCusShow');
            Route::get('viewdetail/{id}', 'customerController@getCusviewdetail');
            Route::get('confirmbill/{id}', 'customerController@getConfirmbill');
            Route::get('delete/{id}', 'customerController@getCusDelete');
            Route::get('deletebill/{id}', 'customerController@getDeleteBill');
            Route::get('viewdetailbill/{id}', 'customerController@getViewDetailBill');
        });
        Route::get('bill/show', 'customerController@getBillShow');
        Route::group(['prefix' => 'comment/'], function () {
            Route::get('show', 'CommentController@getCommentShow');
            Route::get('delete/{id}', 'CommentController@getCommentDelete');
        });
        Route::group(['prefix' => 'contact/'], function () {
            Route::get('show', 'ContactController@getContactShow');
            Route::get('delete/{id}', 'ContactController@getContactDelete');
            Route::post('show/{id}', 'ContactController@postContactRep');
        });
    });
});
// ================================= END ADMIN =================================