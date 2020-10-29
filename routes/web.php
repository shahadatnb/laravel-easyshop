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


Route::get('/ac_config', function()
    {
        //$route_cache = Artisan::call('route:cache');
        //$cache_clear = Artisan::call('cache:clear');
        $config_cache = Artisan::call('config:cache');
        return 'OK';
    });

Route::get('/', 'FrontController@index')->name('/');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
		Route::get('/pending', 'HomeController@pending')->name('pending');
		Route::get('/getpremium', 'HomeController@getpremium')->name('getpremium');
	});

Route::group(['middleware' => ['auth']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	//Route::get('/404', 'PageController@notFind')->name('/404');

	Route::get('/upgrateStandrad', 'HomeController@upgrateStandrad')->name('upgrateStandrad');

	//Route::post('/myWalletToCurrent', 'HomeController@myWalletToCurrent')->name('myWalletToCurrent');
	Route::get('/currentWallet', 'HomeController@currentWallet')->name('currentWallet');
	Route::get('/earnWallet', 'HomeController@earnWallet')->name('earnWallet');
	Route::get('/memberList', 'HomeController@memberList')->name('memberList');
	Route::get('/member/id/{id}', 'HomeController@memberListId')->name('memberListId');
	Route::get('/levelTree', 'HomeController@levelTree')->name('levelTree');
	Route::get('/levelTree/id/{id}', 'HomeController@levelTreeId')->name('levelTreeId');
	Route::get('/level', 'HomeController@level')->name('level');
	Route::get('/matchingBonus', 'HomeController@matchingBonus')->name('matchingBonus');
	Route::post('/sendMoneyAc', 'HomeController@sendMoneyAc')->name('sendMoneyAc');
	//Route::post('/transferFromEarn', 'HomeController@transferFromEarn')->name('transferFromEarn');

	Route::post('/withdrawFormEarn', 'HomeController@withdrawFormEarn')->name('withdrawFormEarn');
	Route::post('/withdrawForMmyWallet', 'HomeController@withdrawForMmyWallet')->name('withdrawForMmyWallet');

	Route::get('/Link/{lType}', 'HomeController@Link')->name('Link');
	Route::get('/tbonus', 'HomeController@tbonus')->name('tbonus');

	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::get('/editProfile', 'ProfileController@editProfile')->name('editProfile');
	Route::post('/updateProfile', 'ProfileController@updateProfile')->name('updateProfile');
	Route::get('/changePass', 'ProfileController@changePass')->name('changePass');
	Route::post('/changePass', 'ProfileController@changePassSave')->name('changePass');
	Route::put('/changePhoto', 'ProfileController@changePhoto')->name('changePhoto');

	Route::get('/addOutsourcingBalance', 'earnController@addOutBalance')->name('addOutBalance');
	Route::get('/Outsourcing', 'earnController@outsourcing')->name('outsourcing');
	Route::get('/ptcs/click', 'PtcController@pctClick')->name('ptc.click');

	Route::get('/myPv', 'HomeController@PointValue')->name('myPv');


	Route::get('/order/myOrder', 'OrderController@myOrder')->name('myOrder');
	Route::get('/order/buyPack/{id}', 'OrderController@buyPack')->name('buyPack');
	Route::post('/order/buyPackSubmit', 'OrderController@buyPackSubmit')->name('buyPackSubmit');

});

/*Route::group(['middleware' => ['auth','premium']], function(){
	Route::get('/myWallet', 'HomeController@myWallet')->name('myWallet');
	Route::get('/earnWallet', 'HomeController@earnWallet')->name('earnWallet');
});*/

Route::group(['middleware' => ['auth','admin']], function(){
	Route::get('/admin-panel', 'AdminController@index')->name('admin.panel');
	Route::get('/allMemberList', 'ProfileController@allMemberList')->name('allMemberList');
	Route::get('/profileView/{id}', 'ProfileController@profileView')->name('profileView');
	Route::post('/smartLinkPost/{id}', 'AdminController@smartLinkPost')->name('smartLinkPost');
	Route::get('/smartLinkDelete/{id}', 'AdminController@smartLinkDelete')->name('smartLinkDelete');

	Route::get('/pin', 'AdminController@pin')->name('pin');
	Route::get('/pingenarate', 'AdminController@pingenarate')->name('pingenarate');

	Route::put('/saveSetting/{id}', 'AdminController@saveSetting')->name('saveSetting');
	Route::get('/withdrawWetting', 'AdminController@withdrawWetting')->name('withdrawWetting');
	Route::get('/withdrawConfirm/{id}', 'AdminController@withdrawConfirm')->name('withdrawConfirm');
	Route::get('/sendMoney', 'AdminController@sendMoney')->name('sendMoney');
	Route::post('/sendMoney', 'AdminController@postSendMoney')->name('sendMoney');
	Route::post('/sendToIncome', 'AdminController@sendToIncome')->name('sendToIncome');
	Route::post('/paymentMoney', 'AdminController@paymentMoney')->name('paymentMoney');

	Route::post('/changePassAdmin', 'ProfileController@changePassAdmin')->name('changePassAdmin');

	Route::resource('ptcs','PtcController');

});

