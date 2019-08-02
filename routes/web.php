<?php
/**
 * LARAVEL LOGS
 */

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
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
/*
 |------------------------------------------------------------------------
 * laravel resource route example
 *-----------------------------------------------------------------------*
 *-Verb----------URI--------------------Action-----------Route Name------*
 * ----------------------------------------------------------------------*
 * GET	        /photos	                index	         photos.index----*
 * GET	        /photos/create	        create	         photos.create---*
 * POST	        /photos	                store	         photos.store----*
 * GET	        /photos/{photo}	        show	         photos.show-----*
 * GET	        /photos/{photo}/edit	edit	         photos.edit-----*
 * PUT/PATCH	/photos/{photo}	        update	         photos.update---*
 * DELETE	    /photos/{photo}	        destroy	         photos.destroy--*
 * ----------------------------------------------------------------------*
 * */



Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/index', function () {
    return view('index');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*
 * Route For Users,
 */
Route::resource('user', 'UserController');
/*
 * End of Users Route
 */




/*
 * Route For Supplier features
 */
Route::resource('supplier', 'SupplierController');
/*
 * End of Supplier Route
 */


/*
 * Route For Inventory features
 */
Route::resource('inventory', 'InventoryController');

Route::get('/multiple', function () {
    return view('inventory.multiple-sales');
});


Route::post('/multiple', 'InventoryController@multipleInsert')->name('multipleInsert'); // add products with multiple sale price
Route::get('/multiple/{items}', 'InventoryController@multiple')->name('multiple'); // add products with multiple sale price
Route::get('/return', 'InventoryController@returnitem')->name('return');
Route::post('/return', 'InventoryController@returnupdate')->name('returnupdate');

Route::get('/inventory-search', 'InventoryController@inventorysearch')->name('inventorysearch');


Route::post('/inventory/bulkupdate', 'InventoryController@bulkupdate')->name('bulkupdate');
Route::post('/inventory/alldata', 'InventoryController@alldata')->name('alldata');

Route::get('/damage', 'InventoryController@damageitem')->name('damage');
Route::post('/damage', 'InventoryController@damageupdate')->name('damageupdate');

Route::get('/lost', 'InventoryController@lostitem')->name('lost');
Route::post('/lost', 'InventoryController@lostupdate')->name('lostupdate');

Route::get('/transfer-product', 'InventoryController@transfer')->name('transfer');
Route::post('/transfer-product', 'InventoryController@transfer')->name('transferpost');

/*
 * End of Inventory Route
 */



/*
 * Route For POS features, pos = point of sale
 */
Route::resource('pos', 'PosController');
Route::post('/pos-entry', 'PosController@store')->name('pos-entry');
Route::get('/itemlist', 'PosController@itemlist')->name('itemlist');
Route::post('/individual_discount', 'PosController@individual_discount')->name('individual_discount');
Route::post('/posprimary', 'PosController@StorePosPrimary')->name('posprimary');
Route::get('/new-entry', 'PosController@newentry')->name('newentry');

Route::get('/print/{pos_session_code}', 'PosController@print')->name('print');
Route::get('/posdelete/{id}', 'PosController@customDelete')->name('posdelete');
/*
 * End of POS Route
 */



/*
 * Route For CUSTOMER features,
 */
Route::resource('customer', 'CustomerController');
Route::post('/customerlist', 'CustomerController@customerlist')->name('customerlist');
/*
 * End of CUSTOMER Route
 */

/*
 * Route For CUSTOMER features,
 */
Route::resource('employee', 'EmployeeController');
Route::post('/employeelist', 'EmployeeController@employeelist')->name('employeelist');
/*
 * End of CUSTOMER Route
 */

/*
 * Route For warehouse features,
 */
Route::resource('warehouse', 'WarehouseController');
/*
 * End of Warehouse Route
 */


/*
 * Route For showroom features,
 */
Route::resource('showroom', 'ShowroomController');
/*
 * End of Warehouse Route
 */


/*
 * Route For showroom features,
 */
Route::resource('product', 'ProductsController');

/*
 * End of Warehouse Route
 */

/*
 * Route For showroom features,
 */
Route::resource('barcode', 'BarcodeController');
Route::post('/barcodesearch', 'BarcodeController@index')->name('barcodesearch');
/*
 * End of Warehouse Route
 */


/*
 * Route For showroom features,
 */
Route::resource('report', 'ReportController');
Route::get('/salesreport', 'ReportController@salesreport')->name('salesreport');
Route::get('/returnreport', 'ReportController@returnreport')->name('returnreport');
Route::get('/productgroupreport', 'ReportController@productgroupreport')->name('productgroupreport');
Route::get('/mompurchasereport', 'ReportController@mompurchasereport')->name('mompurchasereport');
Route::get('/damagereport', 'ReportController@damagereport')->name('damagereport');
Route::get('/suppliersalesreport', 'ReportController@suppliersalesreport')->name('suppliersalesreport');
Route::get('/employeesalesreport', 'ReportController@employeesalesreport')->name('employeesalesreport');
Route::get('/employeedodsalesreport', 'ReportController@employeedodsalesreport')->name('employeedodsalesreport');
Route::get('/salesincentivereport', 'ReportController@salesincentivereport')->name('salesincentivereport');
Route::get('/dailsalessummary', 'ReportController@summary')->name('dailysalessummary');
/*
 * End of Warehouse Route
 */



/**BASIC SETTINGS */
Route::resource('settings', 'SettingsController');