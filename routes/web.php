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

// Way 1 to call any view .

//Route::get('/', function () {
//    return view('welcome');
//});


// Way  2  call any view using controller .
//Route:get('/','PhpLv1@index');


//***********************Front-End  Routes *****************


Route::get('/', [
    'uses' => 'PhpLv1@home',
    'as' => '/'
]);

Route::get('/users/login', [
    'uses' => 'UserController@userLogin',
    'as' => 'newUserLogin'
]);

Route::post('/newUser/loginCheck', 'UserController@newUserLoginCheck')->name('newUserLoginCheck');

Route::get('/newUsers/registration', [
    'uses' => 'UserController@newReg',
    'as' => 'newUserReg'
]);

Route::post('/saveNewUser/registration', 'UserController@newUserRegistration')->name('saveNewUser');

Route::get('/newUsers/logout', [
    'uses' => 'UserController@newUserLogout',
    'as' => 'newUserLogout'
]);

Route::get('/users/account', [
    'uses' => 'UserController@userAccount',
    'as' => 'userAccount'
]);

Route::post('/user/checkoutLogin', 'UserController@userCheckoutLogin')->name('userCheckoutLogin');

Route::post('/user/checkOutRegistration', 'UserController@userSignUp')->name('userReg');

Route::get('/users/shipping', [
    'uses' => 'UserController@userShipping',
    'as' => 'userShipping'
]);

Route::post('/save/shipping', 'UserController@saveShipping')->name('saveShipping');


Route::get('/users/payment', [
    'uses' => 'UserController@userPayment',
    'as' => 'userPayment'
]);

Route::post('/save/order', 'UserController@saveOrder')->name('saveOrder');

Route::get('/user/BankType', [
    'uses' => 'UserController@userBankType',
    'as' => 'userBankType'
]);

Route::post('/save/UserBank', 'UserController@saveUserBank')->name('saveUserBank');

Route::get('/user/BankPayDetails/{id}', [
    'uses' => 'UserController@userBankPayDetails',
    'as' => 'userBankPayDetails'
]);





Route::get('/users/contactUs', [
    'uses' => 'UserController@userContact',
    'as' => 'userContact'
]);


Route::get('/users/catProducts/{id}', [
    'uses' => 'UserController@categoryProducts',
    'as' => 'catProducts'
]);

Route::get('/users/brandProducts/{id}', [
    'uses' => 'UserController@brandProducts',
    'as' => 'brandProducts'
]);



Route::get('/users/viewProducts/{id}', [
    'uses' => 'UserController@userProductView',
    'as' => 'userProductView'
]);

Route::post('/save/UserReview', 'UserController@saveUserReview')->name('saveUserReview');



//***********************Front-End   Cart  Routes *****************
//
Route::post('/addOn/Cart', 'CartController@cartAdd')->name('addToCart');
//
Route::get('/cart/viewProducts', [
    'uses' => 'CartController@cartProductView',
    'as' => 'cartProductView'
]);

Route::get('/removeFrom/cart/{id}', [
    'uses' => 'CartController@removeItem',
    'as' => 'removeItem'
]);


Route::get('/cart/checkOut', [
    'uses' => 'CartController@checkOut',
    'as' => 'checkOut'
]);

Route::post('/update/Cart', 'CartController@updateQuantity')->name('updateQuantity');

Route::get('/cart/clear', [
    'uses' => 'CartController@clearCart',
    'as' => 'clearCart'
]);

//***********************Front-End Cart  Routes *****************











//***********************Front-End  Routes  End *****************



//*******Back-End  Routes ******************


 // *********Category Section Start Routing **************
Route::get('/category/add', [
    'uses' => 'CategoryController@addCat',
    'as' => 'category-add'
]);

Route::get('/category/edit', [
    'uses' => 'CategoryController@editCat',
    'as' => 'edit-category'
]);

Route::get('/category/manage', [
    'uses' => 'CategoryController@manageCat',
    'as' => 'category-manage'
]);

Route::get('/category/unp/{id}', [
    'uses' => 'CategoryController@unpublishedCat',
    'as' => 'catUnp'
]);

Route::get('/category/pub/{id}', [
    'uses' => 'CategoryController@publishedCat',
    'as' => 'catPub'
]);

Route::get('/category/edit/{id}', [
    'uses' => 'CategoryController@editCat',
    'as' => 'catEdit'
]);

Route::get('/category/delete/{id}', [
    'uses' => 'CategoryController@deleteCat',
    'as' => 'catDelete'
]);

Route::post('/Cat/add', 'CategoryController@saveCat')->name('addCat');

Route::post('/Cat/Update', 'CategoryController@updateCat')->name('catUpdate');

// *********Category Section End Routing **************


// *********  Brand Section Start Routing **************

Route::get('/brand/add', [
    'uses' => 'BrandController@addBrand',
    'as' => 'addBrand'
]);

Route::post('/brand/add', 'BrandController@saveBrand')->name('addBrand');

Route::get('/brand/manage', [
    'uses' => 'BrandController@manageBrand',
    'as' => 'manageBrand'
]);

Route::get('/brand/unpublished/{id}', [
    'uses' => 'BrandController@brandUnp',
    'as' => 'brandUnp'
]);

Route::get('/brand/published/{id}', [
    'uses' => 'BrandController@brandPub',
    'as' => 'brandPub'
]);

Route::get('/brand/edit/{id}', [
    'uses' => 'BrandController@brandEdit',
    'as' => 'brandEdit'
]);

Route::post('/brand/update','BrandController@brandUpdate')->name('brandUpdate');

Route::get('/brand/delete/{id}', [
    'uses' => 'BrandController@brandDelete',
    'as' => 'brandDelete'
]);
// *********  Brand Section End Routing **************

// *********  Products  Section Start  Routing **************

Route::get('/product/add', [
    'uses' => 'ProductController@addProduct',
    'as' => 'addProduct'
]);

Route::post('/product/add','ProductController@saveProduct')->name('saveProduct');

Route::get('/product/manage', [
    'uses' => 'ProductController@manageProduct',
    'as' => 'manageProduct'
]);

Route::get('/product/view/{id}', [
    'uses' => 'ProductController@productView',
    'as' => 'productView'
]);


Route::get('/product/unpublished/{id}', [
    'uses' => 'ProductController@productUnp',
    'as' => 'productUnp'
]);

Route::get('/product/published/{id}', [
    'uses' => 'ProductController@productPub',
    'as' => 'productPub'
]);

Route::get('/product/edit/{id}', [
    'uses' => 'ProductController@productEdit',
    'as' => 'productEdit'
]);


Route::post('/product/update','ProductController@updateProduct')->name('updateProduct');


Route::get('/product/delete/{id}', [
    'uses' => 'ProductController@productDelete',
    'as' => 'productDelete'
]);


// *********  Products  Section End Routing **************


// *********  Ads Models  Section Start Routing **************


Route::get('/adsModels/add', [
    'uses' => 'AdsController@addModels',
    'as' => 'addModels'
]);

Route::post('/adsModels/save','AdsController@saveAds')->name('saveAds');

Route::get('/adsModels/manage', [
    'uses' => 'AdsController@manageModels',
    'as' => 'manageModels'
]);

Route::get('/adsModels/Unpublished/{id}', [
    'uses' => 'AdsController@adsUnpublished',
    'as' => 'adsUnpublished'
]);

Route::get('/adsModels/Published/{id}', [
    'uses' => 'AdsController@adsPublished',
    'as' => 'adsPublished'
]);

Route::get('/adsModels/Delete/{id}', [
    'uses' => 'AdsController@adsDelete',
    'as' => 'adsDelete'
]);

// *********  Ads Models  Section End Routing **************

// *********  Partners   Section Start Routing **************

Route::get('/partner/add', [
    'uses' => 'PartnersController@addPartner',
    'as' => 'addPartner'
]);

Route::post('/partner/save','PartnersController@savePartner')->name('savePartner');

Route::get('/partner/manage', [
    'uses' => 'PartnersController@managePartner',
    'as' => 'managePartner'
]);

Route::get('/partner/unpublished/{id}', [
    'uses' => 'PartnersController@partnerUnpublished',
    'as' => 'partnerUnpublished'
]);

Route::get('/partner/published/{id}', [
    'uses' => 'PartnersController@partnerPublished',
    'as' => 'partnerPublished'
]);

Route::get('/partner/delete/{id}', [
    'uses' => 'PartnersController@partnerDelete',
    'as' => 'partnerDelete'
]);

// *********  Partners   Section End Routing *************

// *********  Slider   Section Start Routing *************

Route::get('/sliderImg/add', [
    'uses' => 'SliderController@addSliderImg',
    'as' => 'addSliderImg'
]);

Route::post('/slider/save','SliderController@saveSlider')->name('saveSlider');

Route::get('/sliderImg/manage', [
    'uses' => 'SliderController@manageSliderImg',
    'as' => 'manageSliderImg'
]);

Route::get('/sliderImg/unpublished/{id}', [
    'uses' => 'SliderController@sliderUnpublished',
    'as' => 'sliderUnpublished'
]);

Route::get('/sliderImg/published/{id}', [
    'uses' => 'SliderController@sliderPublished',
    'as' => 'sliderPublished'
]);

Route::get('/sliderImg/delete/{id}', [
    'uses' => 'SliderController@sliderDelete',
    'as' => 'sliderDelete'
]);





// *********  Slider   Section End Routing *************


Route::get('/Orders/Manage', [
    'uses' => 'OrdersManage@manageOrders',
    'as' => 'manageOrders'
]);

Route::get('/Orders/View/{id}', [
    'uses' => 'OrdersManage@orderView',
    'as' => 'orderView'
]);

Route::get('/Orders/InvoiceView/{id}', [
    'uses' => 'OrdersManage@orderInvoiceView',
    'as' => 'orderInvoiceView'
]);


Route::get('/Orders/InfoUpdate/{id}', [
    'uses' => 'OrdersManage@orderUpdate',
    'as' => 'orderUpdate'
]);



Route::post('/Orders/Update','OrdersManage@updateOrders')->name('updateOrders');

Route::get('/Orders/Delete/{id}', [
    'uses' => 'OrdersManage@orderDelete',
    'as' => 'orderDelete'
]);



//******* Details Section *****************




Route::get('/Company/AddDetails', [
    'uses' => 'OrdersManage@addCompanyDetails',
    'as' => 'addCompanyDetails'
]);


Route::post('/Orders/Update','OrdersManage@saveBasicInfo')->name('saveBasicInfo');



Route::get('/Company/ManageDetails', [
    'uses' => 'OrdersManage@manageCompanyDetails',
    'as' => 'manageCompanyDetails'
]);

Route::get('/Company/InfoDelete/{id}', [
    'uses' => 'OrdersManage@basicInfoDelete',
    'as' => 'basicInfoDelete'
]);








Route::get('/Payment/AddDetails', [
    'uses' => 'OrdersManage@addPaymentInfo',
    'as' => 'addPaymentInfo'
]);


Route::post('/Payment/SaveDetails','OrdersManage@savePaymentInfo')->name('savePaymentInfo');




Route::get('/Payment/ManageDetails', [
    'uses' => 'OrdersManage@managePaymentInfo',
    'as' => 'managePaymentInfo'
]);


Route::get('/Payment/DeleteDetails/{id}', [
    'uses' => 'OrdersManage@payInfoDelete',
    'as' => 'payInfoDelete'
]);




// *********  Back-End  Section End Routing **************



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
