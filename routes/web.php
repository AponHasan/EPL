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

Route::get('/', function () {
    return view('newwelcome');
});

//Start Dealer  Section

Route::get('/dealer-login', function () {
    return view('Dealer.login');
});


Route::post('login-check','Dealer\LoginController@login')->name('dealer.login');



// End Dealer  Section
Route::get('/admin', function () {
    return view('layouts.app-layout');
});

Route::get('/test','Admin\ACL\AccessControlListController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//dealer
Route::get('/dealer/index','DealerController@index')->name('dealer.index');
Route::get('/dealer/create','DealerController@getcreate')->name('dealer.getcreate');
Route::post('/dealer/create','DealerController@postcreate')->name('dealer.postcreate');

Route::get('/dealer/edit/{id}','DealerController@getedit')->name('dealer.getedit');
Route::post('/dealer/update/','DealerController@postdealeredit')->name('dealer.postdealeredit');

Route::get('/dealer/passwordset','DealerController@passwordset')->name('dealer.passwordset');
Route::post('/dealer/passwordset','DealerController@password')->name('dealer.password');


// Dealer Zone
Route::get('dealersettings/zone/create','DealerZoneController@getCreate')->name('dealersettings.zone.create');
Route::post('dealersettings/zone/create','DealerZoneController@postCreate')->name('dealersettings.zone.postcreate');
Route::DELETE('dealersettings/zone/delete/{id}','DealerZoneController@destroy')->name('dealersettings.zone.delete');
Route::PATCH('dealersettings/zone/update/{id}','DealerZoneController@update')->name('dealersettings.zone.update');


// Dealer Type
Route::get('dealersettings/type/create','DealerTypeController@getCreate')->name('dealersettings.type.create');
Route::post('dealersettings/type/create','DealerTypeController@postCreate')->name('dealersettings.type.postcreate');
Route::DELETE('dealersettings/type/delete/{id}','DealerTypeController@destroy')->name('dealersettings.type.delete');
Route::PATCH('dealersettings/type/update/{id}','DealerTypeController@update')->name('dealersettings.type.update');


// Dealer Area
Route::get('dealersettings/area/create','DealerAreaController@getCreate')->name('dealersettings.area.create');
Route::post('dealersettings/area/create','DealerAreaController@postCreate')->name('dealersettings.area.postcreate');
Route::DELETE('dealersettings/area/delete/{id}','DealerAreaController@destroy')->name('dealersettings.area.delete');
Route::PATCH('dealersettings/area/update/{id}','DealerAreaController@update')->name('dealersettings.area.update');


// Dealer SPO
Route::get('dealersettings/spo/index','DealerSpoController@index')->name('dealersettings.spo.index');
Route::get('dealersettings/spo/create','DealerSpoController@getCreate')->name('dealersettings.spo.create');
Route::post('dealersettings/spo/create','DealerSpoController@postCreate')->name('dealersettings.spo.postcreate');


// Dealer Line Manager
Route::get('dealersettings/linemanager/index','DealerLineManagerController@index')->name('dealersettings.linemanager.index');
Route::get('dealersettings/linemanager/create','DealerLineManagerController@getCreate')->name('dealersettings.linemanager.create');
Route::post('dealersettings/linemanager/create','DealerLineManagerController@postCreate')->name('dealersettings.linemanager.postcreate');


Route::resources([
    'department'=>'DepartmentController',
    'bank'=>'BankController',
    'unit'=>'UnitController',
    'division'=>'DivisionController',
    'designation'=>'DesignationController',
    'company'=>'CompanyController',
    'section'=>'SectionController',
    'staffcateory'=>'StaffCategoryController',
    ]);


// Employee
Route::get('/emp/name/get/{id}','EmployeeController@getempname');
Route::get('/employee/index','EmployeeController@index')->name('emp.index');
Route::get('/employee/create','EmployeeController@create')->name('emp.create');
Route::post('/employee/create','EmployeeController@store')->name('emp.store');

Route::get('/spo/passwordset','EmployeeController@passwordset')->name('spo.passwordset');
Route::post('/spo/passwordset','EmployeeController@password')->name('spo.password');

//comments
Route::post('/home','CommentsController@commentpost')->name('comment.post');



// Factory
Route::get('/factory/index','FactoryController@index')->name('factory.index');
Route::get('/factory/create','FactoryController@getcreate')->name('factory.create');
Route::post('/factory/create','FactoryController@postcreate')->name('factory.store');


// Product Settins
Route::resources([
    'productdimensions'=>'ProductDimensionController',
    'productcolors'=>'ProductColorController',
    ]);

// Product
Route::get('product/index','ProductController@index')->name('product.index');
Route::get('product/create','ProductController@create')->name('product.create');
Route::post('product/store','ProductController@store')->name('product.store');
Route::PATCH('product/update/{id}','ProductController@update')->name('product.update');
Route::delete('product/destroy/{id}','ProductController@destroy')->name('product.destroy');

//get product price
Route::get('/dpprice/{id}','ProductController@getdpprice');


// product Stock in
Route::get('product/stock/index','StockInController@index')->name('product.stock.index');
Route::get('product/stock_in','StockInController@stock_in_create')->name('product.stock.in');
Route::post('product/stock_in','StockInController@stock_in_store')->name('product.stock.in.store');


// dealer Demand  letter
Route::get('/dealer/name/get/{id}','DemandController@getdlrname');
Route::get('dealer/demandletter','DemandController@demandcreate')->name('dealer.demand');
Route::post('dealer/demandletter/copy','DemandController@demandcreatecopy')->name('dealer.demand.copy');
Route::get('dealer/demandletter/product/price/{id}','DemandController@getproductprice');
Route::post('dealer/demandletter/generate','DemandController@demandgenerate')->name('demandletter.generate');
Route::get('dealer/demandletter/list','DemandController@index')->name('demandletter.index');
// deman number
Route::get('/dealer/demandletter/demandeNumber','DemandController@demandeNumber')->name('demandletter.demandeNumber');


//Demand Epl Check 
Route::get('dealer/demandletter/epl/check-out/{id}','DemandlettercheckController@dealer_demand_list')->name('demandletter.check-out');
Route::post('dealer/demandletter/epl/check-out/create','DemandlettercheckController@demand_check_out')->name('demandletter.check-out.create');
Route::post('/demand/product/unhold/{id}','DemandlettercheckController@dealer_demand_unhold')->name('demandletter.product.unhold');
Route::post('/demand/product/hold/{id}','DemandlettercheckController@dealer_demand_hold')->name('demandletter.product.hold');
Route::post('/demand/product/approved/{id}','DemandlettercheckController@dealer_demand_approved')->name('demandletter.product.approved');
// Route




// Demand confirm   Order
Route::get('/demand-confirm/productlist/{id}','DemandConfirmController@demandconfirmlist');
Route::get('demand-check-list/','DemandConfirmController@demand_check_list')->name('check.list');
Route::get('demand-check-list-confirm/{id}','DemandConfirmController@demand_check_list_confirm')->name('check.list.confirm');
Route::post('check-list-confirm/','DemandConfirmController@check_list_confirm')->name('list.confirm');
// demand confirm number
Route::get('/dealer/demandletter/demandconfirmNumber','DemandConfirmController@demandconfirmNumber')->name('demandletter.demandconfirmNumber');
Route::get('/dealer/demandletter/demandcheckmNumber','DemandConfirmController@demandcheckmNumber')->name('demandletter.demandcheckmNumber');



// Demand Confirm list
Route::get('demand/confirm-list/','DemandConfirmController@confirmlist')->name('confirm.list');
Route::post('demand/confirm-list/get','DemandConfirmController@confirmlistget')->name('confirm.list.get');
Route::get('/dealer/demandno/get/{id}','DemandConfirmController@confirmno');





Route::post('sales/promo/status/active','SalsePromotionController@statusactive')->name('promotion.status.active');
Route::post('sales/promo/status/deactive','SalsePromotionController@statusdeactive')->name('promotion.status.deactive');
Route::get('/salse/promotion/index','SalsePromotionController@index')->name('promotion.index');
Route::get('/salse/promotion','SalsePromotionController@setpromotion')->name('set.promotion');
Route::post('/salse/promotion/set','SalsePromotionController@storesetpromotion')->name('store.set.promotion');

Route::get('/salse/promotion/incentive','SalsePromotionController@setincentive')->name('set.promotion.incentive');
Route::get('/salse/promotion/incentive/index','SalsePromotionController@indexincentive')->name('index.promotion.incentive');
Route::post('/salse/promotion/incentive','SalsePromotionController@storesetincentive')->name('store.incentive.promotion');


// Import
Route::get('import/csv','CsvFileController@index')->name('import.index');
Route::Post('import/department/csv','CsvFileController@departmentCsvImport')->name('department.import');
Route::Post('import/dealer/csv','CsvFileController@dealerCsvImport')->name('dealer.import');
Route::Post('import/dealer/zone/csv','CsvFileController@dealerzoneCsvImport')->name('dealer.zone.import');
Route::Post('import/dealer/type/csv','CsvFileController@dealertypeCsvImport')->name('dealer.type.import');
Route::Post('import/dealer/designation/csv','CsvFileController@dealerdesignationCsvImport')->name('dealer.designation.import');
Route::Post('import/division/csv','CsvFileController@divisionCsvImport')->name('division.import');
Route::Post('import/linem/csv','CsvFileController@lineManagerCsvImport')->name('linemanager.import');
Route::Post('import/spo/csv','CsvFileController@spoCsvImport')->name('spo.import');
Route::Post('import/factory/csv','CsvFileController@factoryCsvImport')->name('factory.import');
Route::Post('import/staffcategory/csv','CsvFileController@staffcategoryCsvImport')->name('staffcategory.import');
Route::Post('import/dealerarea/csv','CsvFileController@dealerareaCsvImport')->name('dealerarea.import');
Route::Post('import/product/csv','CsvFileController@productCsvImport')->name('product.import');


// Accounts
Route::get('accounts/collection/index','Account\CollectionController@index')->name('collection.index');
Route::get('accounts/collection','Account\CollectionController@collection')->name('accounts.collection');
Route::post('accounts/collection','Account\CollectionController@storecollection')->name('collection.amount');


Route::get('dealer/collection/target/index','Account\CollectionController@dtarget')->name('dealer.collection.dtarget');
Route::get('dealer/collection/target/set','Account\CollectionController@dtargetset')->name('dealer.collection.dtarget.set');
Route::post('dealer/target/set','Account\CollectionController@dealertargetset')->name('dealer.target.set');

Route::get('linemanager/collection/target/index','Account\CollectionController@lmtarget')->name('linemanager.collection.lmtarget');
Route::get('linemanager/collection/target/set','Account\CollectionController@lmtargetset')->name('linemanager.collection.lmtarget.set');
Route::post('linemanager/target/set','Account\CollectionController@linemanagertargetset')->name('linemanager.target.set');

Route::get('spo/collection/target/index','Account\CollectionController@starget')->name('spo.collection.starget');
Route::get('spo/collection/target/set','Account\CollectionController@stargetset')->name('spo.collection.starget.set');
Route::post('spo/target/set','Account\CollectionController@spotargetset')->name('spo.target.set');

Route::get('other/collection/target/index','Account\CollectionController@otarget')->name('other.collection.otarget');
Route::get('other/collection/target/set','Account\CollectionController@otargetset')->name('other.collection.otarget.set');
Route::post('other/target/set','Account\CollectionController@othertargetset')->name('other.target.set');





// Reports
Route::get('delivery/challan','ChallanController@index')->name('delivary.challan');




